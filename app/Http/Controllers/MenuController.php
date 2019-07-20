<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;

class MenuController extends Controller
{
    public function getDanhSach()
    {
        $menus = Menu::where('parent_id', 0)->orderBy('position')->get();
        return view('admin.menu.list', compact('menus'));
    }

    public function updateDanhSach(Request $request)
    {
        $input = json_decode($request->input('data'));
        $i = 1;
        $j = 1;
        $k = 1;
        
        foreach ($input as $menu) {
            if (isset($menu->children))
            {
                $parent_id = $menu->id;
                foreach ($menu->children as $sub) {
                    if (isset($sub->children))
                    {   
                        $parent_idd = $sub->id;
                        foreach ($sub->children as $value)
                        {
                            Menu::where('id', $value->id)->update(['position' => $k, 'parent_id' => $parent_idd]);
                            $k++;
                        }

                    }
                    
                    Menu::where('id', $sub->id)->update(['position' => $j, 'parent_id' => $parent_id]);
                    $j++;

                }
            }

            Menu::where('id', $menu->id)->update(['position' => $i, 'parent_id' => 0]);
            $i++;
        }

        return response()->json(['success'=> 'Đã lưu!']);
    }

    public function postThem(Request $request)
    {
        $this->validate($request,
        [
            'label' => 'required|min:3|max:40',
            // 'url' => 'required|url'
        ],
        [
            'label.required' => 'Chưa nhập tên liên kết',
            'label.min' => 'Tên liên kết phải từ 3 đến 40 ký tự',
            'label.max' => 'Tên liên kết phải từ 3 đến 40 ký tự',
            // 'url.required' => 'Chưa nhập liên kết',
            // 'url.url' => 'Liên kết phải có dạng http://domain.com/abc'
        ]);
        $menus = Menu::all()->max();
        if (isset($menus->id))
        {
            $stt = $menus->id;
        }
        else
        {
            $stt=0;
        }
        $menu = new Menu;
        $menu->label = $request->label;
        $menu->url = $request->url;
        $menu->position = $stt + 1;
        $menu->save();

        return redirect('admin/menu')->with('thongbao', 'Thêm menu thành công!');
    }

    public function getSua($id)
    {
        $menus = Menu::where('parent_id', 0)->orderBy('position')->get();
        $menu = Menu::find($id);
        return view('admin.menu.edit', compact('menus', 'menu'));
    }

    public function postSua(Request $request, $id)
    {
        $menu = Menu::find($id);

        $this->validate($request,
        [
            'label' => 'required|min:3|max:30',
            // 'url' => 'required|url'
        ],
        [
            'label.required' => 'Chưa nhập tên liên kết',
            'label.min' => 'Tên liên kết phải từ 3 đến 30 ký tự',
            'label.max' => 'Tên liên kết phải từ 3 đến 30 ký tự',
            // 'url.required' => 'Chưa nhập liên kết',
            // 'url.url' => 'Liên kết phải có dạng http://domain.com/abc'
        ]);

        $menu->label = $request->label;
        $menu->url = $request->url;
        $menu->save();

        return redirect('admin/menu')->with('thongbao', 'Sửa menu thành công!');
    }

    public function getXoa($id)
    {
        Menu::destroy($id);
        return redirect('admin/menu')->with('thongbao', 'Xóa menu thành công!');
    }
}
