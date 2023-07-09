<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Orders;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function cartList()
    {
        $cart = session('cart');
        // session()->forget('cart');
        // session()->save();
        // dd(session()->all());

        return view('cart', ['products' => $cart, 'i' => 1, 'total_price' => 0]);
    }

    public function addToCart(Request $request)
    {
        $product = Product::findOrFail($request->id);
        $cart = session()->get('cart', []);

        if (isset($cart[$request->id])) {
            $cart[$request->id]['order_qty']++;
            $cart[$request->id]['order_price'] = $cart[$request->id]['order_qty'] * $cart[$request->id]['product_price'];
        } else {
            $cart[$request->id] = [
                "product_id" => $product->id,
                "name" => $product->name,
                "image" => $product->image,
                "category" => $product->category(),
                "user_id" => Auth()->user()->id,
                "order_qty" => 1,
                "product_qty" => $product->qty,
                "product_price" => $product->price,
                "order_price" => $product->price,
            ];
        }
        session()->put('cart', $cart);
        session()->save();


        return redirect()->back()->with('success', 'Товар успешно добавлен');
    }

    public function deleteFromCart(Request $request)
    {
        $sessionCart = session()->get('cart');
        unset($sessionCart[$request->id]);

        session()->put('cart', $sessionCart);

        return redirect()->route('cart.list');
    }


    public function cartUpdate(Request $request)
    {
        $cart = session('cart');

        $cart[$request->id]['order_qty'] = $request->qty + 0;
        $cart[$request->id]['order_price'] = $request->qty * $cart[$request->id]['product_price'];

        session()->put('cart', $cart);

        // dd(session('cart'));
    }


    public function purchaseProduct()
    {
        $totalPrice = 0;
        $jsonProducts = [];
        $session = session('cart');
        // dd($session);
        if ($session == null) {
            return redirect(route('cart.list'))->with('error', 'Добавьте в корзину что-нибудь');
        }
        foreach (session('cart') as $cartItem) {
            $totalPrice += $cartItem["order_price"];
        }

        if (Auth()->user()->mili < $totalPrice) {
            return redirect(route('cart.list'))->with('error', 'Не хватает мили');
        }

        DB::transaction(function () use ($totalPrice) {
            foreach (session('cart') as $cartItem) {
                $jsonProducts[] = [
                    "product_name" => $cartItem["name"],
                    "product_category" => $cartItem["category"],
                    "product_image" => $cartItem["image"],
                    "product_qty" => $cartItem["order_qty"] + 0,
                    "product_price" => $cartItem["order_price"],
                ];
                Product::where('id', $cartItem["product_id"])->update([
                    "qty" => $cartItem["product_qty"] - $cartItem["order_qty"],
                ]);
            }


            $order = [
                'number_order' => uniqid(),
                'products' => json_encode($jsonProducts),
                'user_id' => Auth()->user()->id,
                'sum' => $totalPrice,
            ];

            Orders::create($order);

            User::where('id', Auth()->user()->id)->update([
                'mili' => Auth()->user()->mili - $totalPrice
            ]);
            session()->forget('cart');
        });


        return redirect()->route('profile.page')->with('success','Заказ успешно оформлен');
    }

    public function clearCart()
    {
        session()->forget('cart');
        return redirect()->back();
    }
}
