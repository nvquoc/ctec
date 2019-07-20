<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Category;

class CategoryController extends Controller
{
    public function getDanhSach()
    {
        $categories = Category::all()->sortByDESC('id');
        return view('admin.categories.list', compact('categories'));
    }

    public function postThem(Request $request)
    {
        $this->validate($request,
        [
            'name' => 'required|unique:categories,name|min:3|max:50'
        ],
        [
            'name.required' => 'Chưa nhập tên loại tin',
            'name.unique' => 'Tên loại tin đã tồn tại',
            'name.min' => 'Tên loại tin phải từ 3 đến 50 ký tự',
            'name.max' => 'Tên loại tin phải từ 3 đến 50 ký tự'
        ]);

        $category = new Category;
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->save();

        return redirect('admin/loaitin')->with('thongbao', 'Thêm loại tin thành công!');
    }

    public function getSua($id)
    {
        $categories = Category::all();
        $category = Category::find($id);
        if (isset($category))
        {
            return view('admin.categories.edit', compact('categories','category'));
        }
        else
        {
            return redirect('admin/loaitin')->with('thongbao', 'Loại tin không tồn tại!');
        }
    }

    public function postSua(Request $request, $id)
    {
        $category = Category::find($id);

        $this->validate($request,
        [
            'name' => 'required|min:3|max:50|unique:categories,name,'.$category->id,
        ],
        [
            'name.required' => 'Chưa nhập tên loại tin',
            'name.unique' => 'Tên loại tin đã tồn tại',
            'name.min' => 'Tên loại tin phải từ 3 đến 50 ký tự',
            'name.max' => 'Tên loại tin phải từ 3 đến 50 ký tự'
        ]);
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->save();

        return redirect('admin/loaitin')->with('thongbao', 'Sửa thành công!');
    }

    public function getXoa($id)
    {
        Category::destroy($id);
        return redirect('admin/loaitin')->with('thongbao', 'Xóa thành công!');
    }
}
