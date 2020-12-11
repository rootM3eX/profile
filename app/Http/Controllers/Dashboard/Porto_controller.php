<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Porto;

class Porto_controller extends Controller
{
    public function index()
    {
        $title = 'Add Data';
        return view('dashboard.porto.index',compact('title'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'judul'=>'required',
            'url'=>'required'
        ]);

        $data['judul'] = $request->judul;
        $data['url'] = $request->url;
        $data['deskripsi'] = $request->deskripsi;
        $file = $request->file('photo');
        if ($file) {
            $file->move('uploads', $file->getClientOriginalName());
            $data['photo'] = 'uploads/'.$file->getClientOriginalName();
        }
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');

        Porto::insert($data);

        \Session::flash('sukses','Data Berhasil Di Post');

        return redirect()->back();
    }

    public function show()
    {
        $title = 'Show Portofolio';
        $data = Porto::paginate(5);

        return view('dashboard.porto.show',compact('title','data'));
    }

    public function edit($id)
    {
        $dt = Porto::find($id);
        $title = 'Edit Portofolio';

        return view('dashboard.porto.edit',compact('title','dt'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'judul'=>'required',
            'url'=>'required'
        ]);

        $data['judul'] = $request->judul;
        $data['url'] = $request->url;
        $data['deskripsi'] = $request->deskripsi;
        $file = $request->file('photo');
        if ($file) {
            $file->move('uploads', $file->getClientOriginalName());
            $data['photo'] = 'uploads/'.$file->getClientOriginalName();
        }
        //$data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');

        Porto::where('id',$id)->update($data);

        \Session::flash('sukses','Data Berhasil Di Update');

        return redirect()->back();
    }

    public function delete($id)
    {
        try {
            Porto::where('id',$id)->delete();

            \Session::flash('sukses','Data Berhasil Di Hapus');
        } catch (\Throwable $th) {
            \Session::flash('gagal',$th->getMessage());
        }

        return redirect()->back();
    }

    public function detail($id)
    {
        $title = 'Detail Portofolio';
        $dt = Porto::find($id);

        return view('dashboard.porto.detail',compact('title','dt'));
    }

    public function search()
    {
        $search = $_GET['query'];
        $porto = Porto::where('title','LIKE','%'.$search.'%')->get();

        return view('dashboard.porto.search',compact('porto'));
    }
}
