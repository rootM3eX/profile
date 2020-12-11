<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class Category_controller extends Controller
{
    public function index()
    {
        $title = 'Category Post';

        return view('dashboard.category.index',compact('title'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required'
        ]);
        $data['name'] = $request->name;
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');

        Category::insert($data);

        \Session::flash('sukses','Data Berhasil Di Post');

        return redirect()->back();
    }

    public function show()
    {
        $title = 'Show Category';
        $data = Category::paginate(5);

        return view('dashboard.category.show',compact('title','data'));
    }

    public function edit($id)
    {
        $title = 'Edit Category';
        $dt = Category::find($id);

        return view('dashboard.category.edit',compact('title','dt'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'=>'required'
        ]);
        $data['name'] = $request->name;
        #$data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');

        Category::where('id',$id)->update($data);

        \Session::flash('sukses','Data Berhasil Di Update');

        return redirect()->back();
    }

    public function delete($id)
    {
        try {
            Category::where('id',$id)->delete();

            \Session::flash('sukses','Data Berhasil Di Delete');
        } catch (\Throwable $th) {
            \Session::flash('gagal',$th->getMessage());
        }

        return redirect()->back();
    }
}
