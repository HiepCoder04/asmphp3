<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function listCategory()
    {
        $categories = Category::paginate(10);
        return view('admin.categories.list-category', compact('categories'));
    }

    public function createCategory()
    {
        return view('admin.categories.create-category');
    }

    public function createPostCategory(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Category::create([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.category.listCategory')->with('message', 'Danh mục đã được thêm thành công.');
    }

    public function updateCategory($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categories.update-category', compact('category'));
    }

    public function updatePatchCategory(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category = Category::findOrFail($id);
        $category->update([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.category.listCategory')->with('message', 'Danh mục đã được cập nhật thành công.');
    }

    public function delete(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.category.listCategory')->with('message', 'Danh mục đã được xóa thành công!');
    }
}

