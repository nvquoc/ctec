<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Page;

class PageController extends Controller
{
    public function getDanhsach()
    {
        $pages = Page::all()->sortByDESC('id');
        return view('admin.pages.list', compact('pages'));
    }

    public function getThem()
    {
        return view('admin.pages.add');
    }

    public function postThem(Request $request)
    {
        $this->validate($request, 
        [
            'name' => 'required|unique:pages|min:3|max:150',
            'content' => 'required'
        ],
        [
            'name.required' => 'Chưa nhập tên trang',
            'name.unique' => 'Tên trang đã tồn tại',
            'name.min' => 'Tên trang phải từ 3 đến 150 ký tự',
            'name.max' => 'Tên trang phải từ 3 đến 150 ký tự',
            'content.required' => 'Chưa nhập nội dung trang'
        ]);

        $page = new Page;
        $page->name = $request->name;
        $page->slug = Str::slug($request->name);
        $page->content = $request->content;
        $page->status = $request->status;

        $page->save();

        return redirect('admin/trang/danhsach')->with('thongbao', 'Thêm trang thành công!');
    }

    public function getSua($id)
    {
        $page = Page::find($id);
        if (isset($page->id))
        {
            return view('admin.pages.edit', compact('page'));
        } else {
            return redirect('admin/trang')->with('thongbao', 'Trang không tồn tại!');
        }
        
    }

    public function postSua(Request $request ,$id)
    {
        $page = Page::find($id);

        $this->validate($request, 
        [
            'name' => 'required|min:3|max:150|unique:pages,name,'.$page->id,
            'content' => 'required'
        ],
        [
            'name.required' => 'Chưa nhập tên trang',
            'name.unique' => 'Tên trang đã tồn tại',
            'name.min' => 'Tên trang phải từ 3 đến 150 ký tự',
            'name.max' => 'Tên trang phải từ 3 đến 150 ký tự',
            'content.required' => 'Chưa nhập nội dung trang'
        ]);

        $page->name = $request->name;
        $page->slug = Str::slug($request->name);
        $page->content = $request->content;
        $page->status = $request->status;

        $page->save();

        return redirect('admin/trang/danhsach')->with('thongbao', 'Sửa trang thành công!');
    }

    public function getXoa($id)
    {
        Page::destroy($id);
        return redirect('admin/trang/danhsach')->with('thongbao', 'Xóa trang thành công!');
    }
}
