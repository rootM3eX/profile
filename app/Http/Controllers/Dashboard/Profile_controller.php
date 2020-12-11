<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class Profile_controller extends Controller
{
    public function index()
    {
        $title = 'Profile';
        $dt = User::where('id',\Auth::user()->id)->first();

        return view('dashboard.profile.index',compact('title','dt'));
    }

    public function update(Request $request)
    {
        try {
            $data['status'] = $request->status;
            $data['alamat'] = $request->alamat;
            $data['nomor'] = $request->nomor;
            $data['created_at'] = date('Y-m-d H:i:s');
            $data['updated_at'] = date('Y-m-d H:i:s');
            $file = $request->file('photo');
            if ($file) {
                $file->move('uploads', $file->getClientOriginalName());
                $data['photo'] = 'uploads/'.$file->getClientOriginalName();
            }

            User::where('id',\Auth::user()->id)->update($data);

            \Session::flash('sukses','Data Profile Berhasil Di Catat');
        } catch (\Throwable $th) {
            \Session::flash('gagal',$th->getMessage());
        }

        return redirect()->back();
    }
}
