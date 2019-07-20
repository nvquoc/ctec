<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Post;
use App\Category;

class PostController extends Controller
{
    public function getDanhSach()
    {
        $posts = Post::all()->sortByDESC('id');
        return view('admin.posts.list', compact('posts'));
    }

    public function getThem()
    {
        $categories = Category::all();
        return view('admin.posts.add', compact('categories'));
    }

    public function postThem(Request $request)
    {
        $this->validate($request, 
        [
            'title' => 'required|unique:posts,title|min:10|max:150',
            'category_id' => 'required',
            'content' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2000'
        ],
        [
            'image.required' => 'Chưa chọn hình ảnh cho bài viết',
            'image.image' => 'Định dạng ảnh không hợp lệ',
            'image.mimes' => 'Định dạng ảnh phải là jpg, jpeg, png',
            'image.max' => 'Ảnh không vượt quá 2Mb',
            'title.required' => 'Chưa nhập tiêu đề bài viết',
            'title.unique' => 'Tiêu đề bài viết đã tồn tại',
            'title.min' => 'Tiêu đề bài viết phải từ 10 đến 150 ký tự',
            'title.max' => 'Tiêu đề bài viết phải từ 10 đến 150 ký tự',
            'category_id.required' => 'Chưa chọn loại tin',
            'content.required' => 'Chưa nhập nội dung bài viết'
        ]);

        $post = new Post;
        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->author_id = Auth::user()->id;
        $post->category_id = $request->category_id;
        $post->content = $request->content;
        $post->is_hot = $request->is_hot;
        $post->status = $request->status;

        if ($request->hasFile('image'))
        {
            $this->validate($request, 
            [
                'image' => 'required|image|mimes:jpg,jpeg,png|max:2000'
            ],
            [
                'image.image' => 'Định dạng ảnh không hợp lệ',
                'image.mimes' => 'Định dạng ảnh phải là jpg, jpeg, png',
                'image.max' => 'Ảnh không vượt quá 2Mb'
            ]);

            $file = $request->file('image');
            $fileName = $file->getClientOriginalName();
            $image = time()."_".$fileName;
            $file->move('upload/images/baiviet',$image);
            $post->image = $image;
        }
        else
        {
            $post->image = "";    
        }

        $post->save();

        return redirect('admin/baiviet/danhsach')->with('thongbao', 'Thêm bài viết thành công!');
    }

    public function getSua($id)
    {
        $categories = Category::all();
        if (Auth::user()->rule == 1)
        {
            $post = Post::find($id);
        } else {
            $post = Auth::user()->post->find($id);
        }

        if (isset($post->id))
        {
                return view('admin.posts.edit', compact('categories', 'post'));
        }
        else
        {
                return redirect('admin/baiviet/danhsach')->with('thongbao', 'Bài viết không tồn tại!');
        }
    }

    public function postSua(Request $request, $id)
    {
        if (Auth::user()->rule == 1)
        {
            $post = Post::find($id);
        } else {
            $post = Auth::user()->post->find($id);
        }
        
        if (isset($post->id))
        {
        $this->validate($request, 
        [
            'title' => 'required|min:10|max:150|unique:posts,title,'.$post->id,
            'category_id' => 'required',
            'content' => 'required'
        ],
        [
            'title.required' => 'Chưa nhập tiêu đề bài viết',
            'title.unique' => 'Tiêu đề bài viết đã tồn tại',
            'title.min' => 'Tiêu đề bài viết phải từ 10 đến 150 ký tự',
            'title.max' => 'Tiêu đề bài viết phải từ 10 đến 150 ký tự',
            'category_id.required' => 'Chưa chọn loại tin',
            'content.required' => 'Chưa nhập nội dung bài viết'
        ]);

        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->category_id = $request->category_id;
        $post->content = $request->content;
        $post->is_hot = $request->is_hot;
        $post->status = $request->status;

        if ($request->hasFile('image'))
        {
            $this->validate($request, 
            [
                'image' => 'image|mimes:jpg,jpeg,png|max:2000'
            ],
            [
                'image.image' => 'Định dạng ảnh không hợp lệ',
                'image.mimes' => 'Định dạng ảnh phải là jpg, jpeg, png',
                'image.max' => 'Ảnh không vượt quá 2Mb'
            ]);

            $file = $request->file('image');
            $fileName = $file->getClientOriginalName();
            $image = time()."_".$fileName;
            $file->move('upload/images/baiviet',$image);
            if (file_exists("upload/images/baiviet/".$post->image))
            {
                unlink("upload/images/baiviet/".$post->image);
            }
            $post->image = $image;
        }

        $post->save();

        return redirect('admin/baiviet/danhsach')->with('thongbao', 'Sửa bài viết thành công!');
        }
        else{
            return back()->with('thongbao', 'Bài viết không tồn tại!');
        }
    }

    public function getXoa($id)
    {
        if (Auth::user()->rule == 1)
        {
            $post = Post::find($id);
        } else {
            $post = Auth::user()->post->find($id);
        }
        
        if (isset($post->id)) {
            if (file_exists("upload/images/baiviet/".$post->image))
            {
                unlink("upload/images/baiviet/".$post->image);
            }
            $post->delete();

            return redirect('admin/baiviet/danhsach')->with('thongbao', 'Xóa bài viết thành công!');
        }
        else
        {
            return redirect('admin/baiviet/danhsach')->with('thongbao', 'Bài viết không tồn tại!');
        }
    }
}
