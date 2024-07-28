<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
class ProductController extends Controller
{
    public function listProduct(){
        $listProduct = Product::paginate(10);
        return view('admin.products.list-product')->with([
            'listProduct' => $listProduct
        ]);
    }
    public function addProduct(){
        $categories = Category::all();
        return view('admin.products.add-product', compact('categories'));
    }
    
    public function addPostProduct(Request $req){
        $data = [
            'name' => $req->nameSP,
            'price'=> $req->priceSP,
            'description' =>$req->description,
            'category_id' => $req->categorySP,
        ];
        Product::create($data);
        return redirect()->route('admin.product.listProduct')->with('message', 'Sản phẩm đã được thêm thành công.');

    }
    public function deleteProduct(Request $req){
        Product::where('id', $req->idproduct)->delete();
       

        // $product = Product::findOrFail($id);
        // $product->delete();
        return redirect()->route('admin.product.listProduct')->with([
            'message'=>'Xóa thành công'
        ]);
    }
    public function updateProduct($idProduct){
        $product = Product::where('id', $idProduct)->first();
        $categories = Category::all();
        return view('admin.products.update-product',compact('product', 'categories'))->with([
            'product' =>$product
        ]);
    }
    public function updatePatchProduct(Request $request, $id)
    {
        $product = Product::find($id);
        $product->name = $request->input('nameSP');
        $product->price = $request->input('priceSP');
        $product->description = $request->input('description');
        $product->category_id = $request->input('categorySP');
        $product->save();

        return redirect()->route('admin.product.listProduct')->with('message', 'Sản phẩm đã được cập nhật thành công!');
    }

}
