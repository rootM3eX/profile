<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;

class Post_controller extends Controller
{
    public function index()
    {
        $title = "Post Blog";
        $data = Category::get();

        return view('dashboard.post.index',compact('title','data'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'judul'=>'required',
            'deskripsi'=>'required'
        ]);

        $data['judul'] = $request->judul;
        $data['category_id'] = $request->category_id;
        $data['deskripsi'] = $request->deskripsi;
        $file = $request->file('photo');
        if ($file) {
            $file->move('uploads', $file->getClientOriginalName());
            $data['photo'] = 'uploads/'.$file->getClientOriginalName();
        }
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');

        Post::insert($data);

        \Session::flash('sukses','Data Berhasil Di Post');

        return redirect()->back();
    }

    public function show()
    {
        $title = "Show Blog";
        $data = Post::paginate(5);

        return view('dashboard.post.show',compact('title','data'));
    }

    public function delete($id)
    {
        try {
            Post::where('id',$id)->delete();

            \Session::flash('sukses','Data Berhasil Di Hapus');
        } catch (\Throwable $th) {
            \Session::flash('gagal',$th->getMessage());
        }

        return redirect()->back();
    }

    public function edit($id)
    {
        $title = "Edit Data Blog";
        $dt = Post::find($id);
        $datas = Category::get();

        return view('dashboard.post.edit',compact('title','dt','datas'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'judul'=>'required',
            'deskripsi'=>'required'
        ]);

        $data['judul'] = $request->judul;
        $data['category_id'] = $request->category_id;
        $data['deskripsi'] = $request->deskripsi;
        $file = $request->file('photo');
        if ($file) {
            $file->move('uploads', $file->getClientOriginalName());
            $data['photo'] = 'uploads/'.$file->getClientOriginalName();
        }
        #$data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');

        Post::where('id',$id)->update($data);

        \Session::flash('sukses','Data Berhasil Di Update');

        return redirect()->back();
    }
    
    public function detail($id)
    {
        $title = "Detail Data Blog";
        $dt = Post::find($id);

        return view('dashboard.post.detail',compact('title','dt'));
    }

    public function thumbnail()
    {
        $title = 'Thumbnail Post';
        $data = Post::paginate(5);

        return view('dashboard.post.photo',compact('title','data'));
    }
    
}
