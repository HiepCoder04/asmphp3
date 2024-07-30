<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function listProduct()
    {
        $listProduct = Product::with('images')->paginate(10);
        return view('admin.products.list-product')->with([
            'listProduct' => $listProduct
        ]);
    }
    public function addProduct()
    {
        $categories = Category::all();
        return view('admin.products.add-product', compact('categories'));
    }

    public function addPostProduct(Request $req)
    {
        $data = [
            'name' => $req->nameSP,
            'price' => $req->priceSP,
            'description' => $req->description,
            'category_id' => $req->categorySP,
        ];
        $product = Product::create($data);

        if ($req->hasFile('images')) {
            foreach ($req->file('images') as $image) {
                $path = $image->store('public/product_images');
                ProductImage::create([
                    'product_id' => $product->id,
                    'image_url' => $path,
                    'image_type' => 'main',
                ]);
            }
        }

        return redirect()->route('admin.product.listProduct')->with('message', 'Sản phẩm đã được thêm thành công.');
    }
    public function deleteProduct(Request $req)
    {
        $product = Product::findOrFail($req->idproduct);
        $product->images()->delete();
        $product->delete();


        // $product = Product::findOrFail($id);
        // $product->delete();
        return redirect()->route('admin.product.listProduct')->with([
            'message' => 'Xóa thành công'
        ]);
    }
    public function updateProduct($idProduct)
    {
        $product = Product::with('images')->findOrFail($idProduct);
        $categories = Category::all();
        return view('admin.products.update-product', compact('product', 'categories'))->with([
            'product' => $product
        ]);
    }
    public function updatePatchProduct(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->update([
            'name' => $request->input('nameSP'),
            'price' => $request->input('priceSP'),
            'description' => $request->input('description'),
            'category_id' => $request->input('categorySP'),
        ]);

        if ($request->hasFile('images')) {
            // Xóa tất cả ảnh cũ nếu cần
            $product->images()->delete(); // Nếu muốn xóa ảnh cũ
    
            foreach ($request->file('images') as $image) {
                $path = $image->store('product_images', 'public');
                $product->images()->create([
                    'image_url' => $path,
                    'image_type' => 'main', // Hoặc logic khác nếu cần
                ]);
            }
        }

        return redirect()->route('admin.product.listProduct')->with('message', 'Sản phẩm đã được cập nhật thành công!');
    }
}
