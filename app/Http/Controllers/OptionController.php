<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Option;

class OptionController extends Controller
{
    public function getSua()
    {
        $site_title = Option::where('name', 'site_title')->first();
        $site_description = Option::where('name', 'site_description')->first();
        $site_footer = Option::where('name', 'site_footer')->first();
        $site_icon = Option::where('name', 'site_icon')->first();
        $site_logo = Option::where('name', 'site_logo')->first();
        $site_banner = Option::where('name', 'site_banner')->first();

        return view('admin.options.index', compact('site_title', 'site_description', 'site_footer', 'site_icon', 'site_logo', 'site_banner'));
    }

    public function postSua(Request $request)
    {
        $site_title = Option::where('name', 'site_title')->first();
        $site_description = Option::where('name', 'site_description')->first();
        $site_footer = Option::where('name', 'site_footer')->first();
        $site_icon = Option::where('name', 'site_icon')->first();
        $site_logo = Option::where('name', 'site_logo')->first();
        $site_banner = Option::where('name', 'site_banner')->first();
        
        $this->validate($request,
        [
            'site_title' => 'required|max:60',
            'site_description' => 'required|max:250'
        ],
        [
            'site_title.required' => 'Chưa nhập tên trang web',
            'site_title.max' => 'Chiều dài tối đa dưới 250 ký tự',
            'site_description.required' => 'Chưa nhập miêu tả trang web',
            'site_description.max' => 'Chiều dài tối đa dưới 250 ký tự',
        ]);

        $site_title = Option::where('name', 'site_title')->update(['value' => $request->site_title]);
        $site_description = Option::where('name', 'site_description')->update(['value' => $request->site_description]);
        $site_footer = Option::where('name', 'site_footer')->update(['value' => $request->site_footer]);

        if ($request->hasFile('site_icon'))
        {
            $site_icon = Option::where('name', 'site_icon')->first();

            $this->validate($request, 
            [
                'site_icon' => 'image|mimes:jpg,jpeg,png,gif|max:2000'
            ],
            [
                'site_icon.image' => 'Định dạng ảnh không hợp lệ',
                'site_icon.mimes' => 'Định dạng ảnh phải là jpg, jpeg, png',
                'site_icon.max' => 'Ảnh không vượt quá 2Mb'
            ]);

            $file = $request->file('site_icon');
            $fileName = $file->getClientOriginalName();
            $image = time()."_".$fileName;
            $file->move('upload/website/icon',$image);
            if (file_exists("upload/website/icon/".$site_icon->value))
            {
                unlink("upload/website/icon/".$site_icon->value);
            }

            Option::where('name', 'site_icon')->update(['value' => $image]);
        }

        if ($request->hasFile('site_logo'))
        {
            $this->validate($request, 
            [
                'site_logo' => 'image|mimes:jpg,jpeg,png,gif|max:2000'
            ],
            [
                'site_logo.image' => 'Định dạng ảnh không hợp lệ',
                'site_logo.mimes' => 'Định dạng ảnh phải là jpg, jpeg, png',
                'site_logo.max' => 'Ảnh không vượt quá 2Mb'
            ]);

            $file = $request->file('site_logo');
            $fileName = $file->getClientOriginalName();
            $image = time()."_".$fileName;
            $file->move('upload/website/logo',$image);
            if (file_exists("upload/website/logo/".$site_logo->value))
            {
                unlink("upload/website/logo/".$site_logo->value);
            }

            Option::where('name', 'site_logo')->update(['value' => $image]);
        }

        if ($request->hasFile('site_banner'))
        {            
            $this->validate($request, 
            [
                'site_banner' => 'image|mimes:jpg,jpeg,png,gif|max:2000'
            ],
            [
                'site_banner.image' => 'Định dạng ảnh không hợp lệ',
                'site_banner.mimes' => 'Định dạng ảnh phải là jpg, jpeg, png',
                'site_banner.max' => 'Ảnh không vượt quá 2Mb'
            ]);

            $file = $request->file('site_banner');
            $fileName = $file->getClientOriginalName();
            $image = time()."_".$fileName;
            $file->move('upload/website/banner',$image);
            if (file_exists("upload/website/banner/".$site_banner->value))
            {
                unlink("upload/website/banner/".$site_banner->value);
            }

            Option::where('name', 'site_banner')->update(['value' => $image]);
        }

        return redirect('admin/caidat')->with('thongbao', 'Chỉnh sửa cài đặt thành công!');
    }
}
