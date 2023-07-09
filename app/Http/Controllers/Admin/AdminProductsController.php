<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\File;

class AdminProductsController extends Controller
{
    public function showProducts()
    {
        $products = Product::all();
        // dd($products);
        return view('admin.page.products', ['products' => $products, 'categorys' => Category::all()]);
    }


    public function addProduct(Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg|max:4096',
        ]);
        $imageName = time() . '.' . $request->image->extension();

        $v = $request->image->move(public_path('assets\product_images'), $imageName);

        // dd($v);
        Product::create([
            'name' => $request['name'],
            'price' => $request['price'],
            'category_id' => $request['category_id'],
            'image' => "assets/product_images/" . $imageName,
            'qty' => $request['qty'],
        ]);

        return redirect(route("showProducts"))->withSuccess('Вы успешно добавили товар');
    }


    public function addProductCategory(Request $request){
        Category::create([
            'name_category'=>$request->category_name
        ]);
        return redirect()->back()->with('success','Категория добавлена');
    }
    public function deleteCategoryProduct(Request $request){
        Category::find($request->id)->delete();
        return redirect()->back()->withSuccess('Вы успешно удалили категорию товар');
    }


    public function editProduct(Request $request)
    {
        $products = Product::join('categories', 'products.category_id', '=', 'categories.id')
            ->select('products.*', 'categories.name_category as categories_name')
            ->get();
        $categorys = Category::all();
        return view('admin.page.edit_products', ['products' => $products, 'edit_product' => Product::find($request->id), 'categorys' => $categorys]);
    }

    public function postEditProduct(Request $request)
    {
        if (isset($request->image)) {
            if (File::exists(public_path($request->oldImage))) {
                File::delete(public_path($request->oldImage));
            }

            $imageName = time() . '.' . $request->image->extension();
            $v = $request->image->move(public_path('assets\product_images'), $imageName);

            // dd($v);
            Product::find($request->id)->update(
                [
                    'name' => $request['name'],
                    'price' => $request['price'],
                    'category_id' => $request['category_id'],
                    'image' => 'assets/product_images/' . $imageName,
                    'qty' => $request['qty'],
                ]
            );
            return redirect(route("showProducts"))->withSuccess('Вы успешно отредактировали товар');
        } else {
            Product::find($request->id)->update(
                [
                    'name' => $request['name'],
                    'price' => $request['price'],
                    'category_id' => $request['category_id'],
                    'qty' => $request['qty'],
                ]
            );
            return redirect(route("showProducts"))->withSuccess('Вы успешно отредактировали товар');
        }
    }

    public function deleteProduct(Request $request)
    {
        Product::find($request->id)->delete();
        return redirect(route("showProducts"))->withSuccess('Вы успешно удалили товар');
    }
}
