<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;

use function PHPUnit\Framework\isNull;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function catalogPage()
    {
        $products = Product::paginate($perPage = 12, $columns = ['*'], $pageName = 'products');
        $categories = Category::all();

        return view('catalog', [
            'products' => $products,
            'categories' => $categories,
        ]);
    }


    public function cardRendering($products)
    {
        $output = '';
        if (!$products->isEmpty()) {
            foreach ($products as $product) {
                $output .=
                    '<div class="product-item w-100">
                    <div class="card-head">
                        <img loading="lazy" class="image-card" src=' . asset($product->image) . '
                            alt="image-card">
                    </div>

                    <div class="card_bottom-section">
                        <div class="card-info">
                            <h5 class="card-name">' . $product->name . '</h5>
                            <p class="card-price">' . $product->price . '
                            <svg width="23" height="23" viewBox="0 0 23 23" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M11.5 22C17.299 22 22 17.299 22 11.5C22 5.70101 17.299 1 11.5 1C5.70101 1 1 5.70101 1 11.5C1 17.299 5.70101 22 11.5 22Z"
                                    stroke="black" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M7.99983 16.3333V7L11.4998 12.8333L14.9998 7V16.3333"
                                    stroke="black" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            </p>
                        </div>

                        <form class="card_bottom-form m-0" method="POST" action="' . route("cart.add") . '"
                            enctype="multipart/form-data">
                            ' . csrf_field() . '
                            <input type="hidden" value="' . $product->id . '" name="id">
                            <button class="purchase" type="submit">
                                <img src="' . asset("./assets/page/catalog/product-buy.svg") . '" alt="buy">
                            </button>
                        </form>

                    </div>
                </div>';
            }
        } else {
            $output = '<div class="w-100">Ничего не найдено</div>';
        }
        return $output;
    }

    public function catalogSort(Request $request)
    {
        if ($request->sort == 'delete') {
            $products = Product::paginate($perPage = 12, $columns = ['*'], $pageName = 'products');
        } else {
            $products = Product::where('category_id', $request->category);
            $min_price = !!$request->minPrice ? $request->minPrice : 0;
            $max_price = !!$request->maxPrice ? $request->maxPrice : 9999;

            $products = $products->whereBetween('price', [$min_price, $max_price])->paginate($perPage = 12, $columns = ['*'], $pageName = 'products');
        }
        return response($this->cardRendering($products));
    }

    public function findProduct(Request $request)
    {

        $products = Product::where('name', 'LIKE', '%' . $request->input('query') . '%')->paginate($perPage = 12, $columns = ['*'], $pageName = 'products');
        $output = '';

        return response($this->cardRendering($products));
    }

    // public function sortBetween(Request $request)
    // {
    //     $products = Product::where('price', '>=', $request->toPrice)->paginate($perPage = 12, $columns = ['*'], $pageName = 'products');
    //     $categories = Category::all();
    //     dd();
    //     $request->fromPrice;
    //     return view('catalog', [
    //         'products' => $products,
    //         'categories' => $categories,
    //     ]);
    // }
}
