<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;

class SlideController extends Controller
{
    public function getDanhSach()
    {
        $slides = Slide::all()->sortByDESC('id');
        return view('admin.slides.list', compact('slides'));
    }

    public function getThem()
    {
        return view('admin.slides.add');
    }

    public function postThem(Request $request)
    {
        $this->validate($request, 
        [
            'name' => 'required|unique:slides|max:50',
            'url' => 'required|url',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:3000'
        ],
        [
            'name.required' => 'Chưa nhập tên slide',
            'name.unique' => 'Tên slide đã tồn tại',
            'name.max' => 'Tên slide không vượt quá 50 ký tự',
            'url.required' => 'Chưa nhập liên kết',
            'url.url' => 'Liên kết không hợp lệ',
            'image.required' => 'Chưa chọn hình',
            'image.image' => 'Định dạng ảnh không hợp lệ',
            'image.mimes' => 'Định dạng ảnh phải là jpg, jpeg, png',
            'image.max' => 'Ảnh không vượt quá 3Mb'
        ]);

        $slide = new Slide;
        $slide->name = $request->name;
        $slide->url = $request->url;
        if ($request->hasFile('image'))
        {
            $file = $request->file('image');
            $fileName = $file->getClientOriginalName();
            $image = time()."_".$fileName;
            $file->move('upload/website/slides', $image);
            $slide->image = $image;
        }
        $slide->save();

        return redirect('admin/slides/danhsach')->with('thongbao', 'Thêm thành công!');
    }

    public function getSua($id)
    {
        $slide = Slide::find($id);
        return view('admin.slides.edit', compact('slide'));
    }

    public function postSua(Request $request, $id)
    {
        $slide = Slide::find($id);

        $this->validate($request, 
        [
            'name' => 'required|max:50|unique:slides,name,'.$slide->id,
            'url' => 'required'
        ],
        [
            'name.required' => 'Chưa nhập tên slide',
            'name.unique' => 'Tên slide đã tồn tại',
            'name.max' => 'Tên slide không vượt quá 50 ký tự',
            'url.required' => 'Chưa nhập liên kết',
            // 'url.url' => 'Liên kết không hợp lệ'
        ]);

        $slide->name = $request->name;
        $slide->url = $request->url;
        
        if ($request->hasFile('image'))
        {
            $this->validate($request, 
            [
                'image' => 'required|image|mimes:jpg,jpeg,png|max:3000'
            ],
            [
                'image.required' => 'Chưa chọn hình',
                'image.image' => 'Định dạng ảnh không hợp lệ',
                'image.mimes' => 'Định dạng ảnh phải là jpg, jpeg, png',
                'image.max' => 'Ảnh không vượt quá 3Mb'
            ]);

            $file = $request->file('image');
            $fileName = $file->getClientOriginalName();
            $image = time()."_".$fileName;
            $file->move('upload/website/slides', $image);
            if (file_exists("upload/website/slides/".$slide->image))
            {
                unlink("upload/website/slides/".$slide->image);
            }
            $slide->image = $image;
        }
        $slide->save();

        return redirect('admin/slides/danhsach')->with('thongbao', 'Sửa thành công!');
    }

    public function getXoa($id)
    {
        $slide = Slide::find($id);
        if (isset($slide->id))
        {
            if (file_exists("upload/website/slides/".$slide->image))
            {
                unlink("upload/website/slides/".$slide->image);
            }
            $slide->delete();

            return redirect('admin/slides/danhsach')->with('thongbao', 'Xóa slide Thành công!');
        }
        else
        {
            return redirect('admin/slides/danhsach')->with('thongbao', 'Slide không tồn tại!');
        }
    }
}
