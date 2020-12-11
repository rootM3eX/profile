<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Navbar;
use App\Models\Subnav;

class Navbar_controller extends Controller
{
    public function index()
    {
        $title = 'Custom Navbar';

        return view('dashboard.navbar.index',compact('title'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required'
        ]);

        $data['name'] = $request->name;
        $data['url'] = $request->url;
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');

        Navbar::insert($data);

        \Session::flash('sukses','Navbar Berhasil Di Tambahkan');

        return redirect()->back();
    }

    public function show()
    {
        $title = 'Custom Navbar';
        $data = Navbar::paginate(5);

        return view('dashboard.navbar.show',compact('title','data'));
    }

    public function edit($id)
    {
        $title = 'Edit Navbar';
        $dt = Navbar::find($id);

        return view('dashboard.navbar.edit',compact('title','dt'));
    }

    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'name'=>'required'
        ]);

        $data['name'] = $request->name;
        $data['url'] = $request->url;
        // $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');

        Navbar::where('id',$id)->update($data);

        \Session::flash('sukses','Navbar Berhasil Di Update');

        return redirect()->back();
    }

    public function delete($id)
    {
        try {
            Navbar::where('id',$id)->delete();

            \Session::flash('sukses','Data Berhasil Di Hapus');
        } catch (\Throwable $th) {
            \Session::flash('gagal',$th->getMessage());
        }

        return redirect()->back();
    }

    //function custom subnav
    public function subnav($id)
    {
        $title = 'Add Sub Navbar';
        $dt = Navbar::find($id);
        $data = Subnav::where('navbar_id',$id)->get();

        return view('dashboard.navbar.sub',compact('title','dt','data'));
    }

    public function subnav_store(Request $request, $id)
    {
        $data['subname'] = $request->subname;
        $data['url'] = $request->url;
        $data['navbar_id'] = $id;
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');

        Subnav::insert($data);

        \Session::flash('sukses','Sub Navbar Berhasil Di Tambahkan');

        return redirect()->back();
    }

    public function sub_delete($id)
    {
        try {
            Subnav::where('id',$id)->delete();

            \Session::flash('sukses','Data Berhasil Di Hapus');
        } catch (\Throwable $th) {
            \Session::flash('gagal',$th->getMessage());
        }

        return back();
    }

    // public function subedit($id)
    // {
    //     $title = 'Edit Subnav';
    //     $dt = Subnav::find($id);

    //     return view('dashboard.navbar.sub-edit',compact('title','dt'));
    // }

    // public function subnav_update(Request $request, $id)
    // {
    //     $data['subname'] = $request->subname;
    //     $data['url'] = $request->url;
    //     // $data['navbar_id'] = $id;
    //     $data['updated_at'] = date('Y-m-d H:i:s');

    //     dd($data);

    //     // Subnav::where('id',$id)->update($data);

    //     // \Session::flash('sukses','Sub Navbar Berhasil Di Update');

    //     // return redirect()->back();
    // }
}
