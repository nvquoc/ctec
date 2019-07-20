<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class UserController extends Controller
{
    public function getDanhSach()
    {
        $users = User::all()->sortByDESC('id');
        return view('admin.users.list', compact('users'));
    }

    public function getThem()
    {
        return view('admin.users.add');
    }

    public function postThem(Request $request)
    {
        $this->validate($request, 
        [
            'name' => 'required|max:50',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|max:32',
            'passwordAgain' => 'required|same:password'
        ],
        [
            'name.required' => 'Chưa nhập tên người dùng',
            'name.max' => 'Tên người dùng không vượt quá 50 ký tự',
            'email.required' => 'Chưa nhập địa chỉ email',
            'email.email' => 'Định dạng email không hợp lệ',
            'email.unique' => 'Địa chỉ email đã được sử dụng',
            'password.required' => 'Chưa nhập mật khẩu',
            'password.min' => 'Mật khẩu phải từ 6 đến 32 ký tự',
            'password.max' => 'mật khẩu phải từ 6 đến 32 ký tự',
            'passwordAgain.required' => 'Chưa nhập lại mật khẩu',
            'passwordAgain.same' => 'Nhập lại mật khẩu không khớp'
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->rule = $request->rule;
        if ($request->hasFile('avatar'))
        {
            $this->validate($request, 
            [
                'avatar' => 'image|mimes:jpg,jpeg,png|max:2000'
            ],
            [
                'avatar.image' => 'Định dạng ảnh không hợp lệ',
                'avatar.mimes' => 'Định dạng ảnh phải là jpg, jpeg, png',
                'avatar.max' => 'Ảnh không vượt quá 2Mb'
            ]);

            $file = $request->file('avatar');
            $fileName = $file->getClientOriginalName();
            $avatar = time()."_".$fileName;
            $file->move('upload/website/avatar',$avatar);
            $user->avatar = $avatar;
        }
        else
        {
            $user->avatar = "avatar.png";    
        }
        $user->save();

        return redirect('admin/nguoidung/danhsach')->with('thongbao', 'Thêm người dùng thành công!');
    }

    public function getSua($id)
    {
        $user = $user = User::find($id);
        if (isset($user->id))
        {
            return view('admin.users.edit', compact('user'));
        } else {
            return redirect('admin/nguoidung')->with('thongbao', 'Người dùng không tồn tại!');
        }
    }

    public function postSua(Request $request, $id)
    {
        $user = User::find($id);

        $this->validate($request, 
        [
            'name' => 'required|max:50',
            'email' => 'required|email|unique:users,email,'.$user->id,
        ],
        [
            'name.required' => 'Chưa nhập tên người dùng',
            'name.max' => 'Tên người dùng không vượt quá 50 ký tự',
            'email.required' => 'Chưa nhập địa chỉ email',
            'email.email' => 'Định dạng email không hợp lệ',
            'email.unique' => 'Địa chỉ email đã được sử dụng'
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->rule = $request->rule;
        if ($request->hasFile('avatar'))
        {
            $this->validate($request, 
            [
                'avatar' => 'image|mimes:jpg,jpeg,png|max:2000'
            ],
            [
                'avatar.image' => 'Định dạng ảnh không hợp lệ',
                'avatar.mimes' => 'Định dạng ảnh phải là jpg, jpeg, png',
                'avatar.max' => 'Ảnh không vượt quá 2Mb'
            ]);

            $file = $request->file('avatar');
            $fileName = $file->getClientOriginalName();
            $avatar = time()."_".$fileName;
            $file->move('upload/website/avatar',$avatar);

            if (file_exists("upload/website/avatar/".$user->avatar))
            {
                if ($user->avatar != 'avatar.png')
                {
                    unlink("upload/website/avatar/".$user->avatar);
                }
            }
            $user->avatar = $avatar;
        }
        if ($request->filled('password') || $request->filled('passwordAgain'))
        {
            $request->validate(
                [
                    'password' => 'required|min:6|max:32',
                    'passwordAgain' => 'required|same:password'
                ],
                [
                    'password.required' => 'Chưa nhập mật khẩu',
                    'password.min' => 'Mật khẩu phải từ 6 đến 32 ký tự',
                    'password.max' => 'mật khẩu phải từ 6 đến 32 ksy tự',
                    'passwordAgain.required' => 'Chưa nhập lại mật khẩu',
                    'passwordAgain.same' => 'Nhập lại mật khẩu không khớp'
                ]);
            $user->password = bcrypt($request->password);
        }

        $user->save();

        return redirect('admin/nguoidung/danhsach')->with('thongbao', 'Sửa người dùng thành công!');
    }

    public function getXoa($id)
    {
        $user = User::find($id);
        if (isset($user->id))
        {
            if (file_exists("upload/website/avatar/".$user->avatar))
            {
                if ($user->avatar == 'avatar.png')
                {
                    $user->delete();
                    return redirect('admin/nguoidung/danhsach')->with('thongbao', 'Xóa người dùng thành công!');
                }
                 else
                {
                    unlink("upload/website/avatar/".$user->avatar);
                    $user->delete();
                    return redirect('admin/nguoidung/danhsach')->with('thongbao', 'Xóa người dùng thành công!');
                }
                
            }
        }
        else
        {
            return redirect('admin/nguoidung/danhsach')->with('thongbao', 'Người dùng không tồn tại!');
        }
    }

    public function getHoSo()
    {
        $user = Auth::user();
        return view('admin.users.profile', compact('user'));
    }

    public function postHoSo(Request $request)
    {
        $user = Auth::user();

        $this->validate($request, 
        [
            'name' => 'required|max:50',
        ],
        [
            'name.required' => 'Chưa nhập tên người dùng',
            'name.max' => 'Tên người dùng không vượt quá 50 ký tự',
        ]);

        $user->name = $request->name;
        if ($request->hasFile('avatar'))
        {
            $this->validate($request, 
            [
                'avatar' => 'image|mimes:jpg,jpeg,png|max:2000'
            ],
            [
                'avatar.image' => 'Định dạng ảnh không hợp lệ',
                'avatar.mimes' => 'Định dạng ảnh phải là jpg, jpeg, png',
                'avatar.max' => 'Ảnh không vượt quá 2Mb'
            ]);

            $file = $request->file('avatar');
            $fileName = $file->getClientOriginalName();
            $avatar = time()."_".$fileName;
            $file->move('upload/website/avatar',$avatar);

            if (file_exists("upload/website/avatar/".$user->avatar))
            {
                if ($user->avatar != 'avatar.png')
                {
                    unlink("upload/website/avatar/".$user->avatar);
                }
            }
            
            $user->avatar = $avatar;
        }
        if ($request->filled('password') || $request->filled('passwordAgain'))
        {
            $request->validate(
                [
                    'password' => 'required|min:6|max:32',
                    'passwordAgain' => 'required|same:password'
                ],
                [
                    'password.required' => 'Chưa nhập mật khẩu',
                    'password.min' => 'Mật khẩu phải từ 6 đến 32 ký tự',
                    'password.max' => 'mật khẩu phải từ 6 đến 32 ksy tự',
                    'passwordAgain.required' => 'Chưa nhập lại mật khẩu',
                    'passwordAgain.same' => 'Nhập lại mật khẩu không khớp'
                ]);
            $user->password = bcrypt($request->password);
        }

        $user->save();

        return redirect('admin/hoso')->with('thongbao', 'Cập nhật hồ sơ người dùng thành công!');
    }

    public function getDangNhap()
    {
        return view('admin.login');
    }

    public function postDangNhap(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password]))
        {
            return redirect('admin')->with('thongbao', 'Đăng Nhập thành công!');
        }
        else
        {
            return redirect('admin/dangnhap')->with('thongbao', 'Sai địa chỉ email hoặc mật khẩu!');
        }
    }

    public function getDangXuat()
    {
        Auth::logout();
        return redirect('admin/dangnhap');
    }
}
