<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function halaman_tambah(Type $var = null)
    {
        return view('admin.halaman_tambah');
    }


    public function tambah_user(Request $request)
    {
        // melalukan validasi
    $validator = Validator::make($request->all(), [
        'email'     =>'unique:users',
    ]);

    //pengondisian error
    if ($validator->fails()) {
        return redirect('/halaman_tambah')->with('error', 'admin sudah ada, masukan pengguna lain!');               
    }
    
    // input data baru kedalam tabel user
    $input = new User();
    $input['name']              = $request->name;
    $input['email']             = $request->email;
    $input['telepon']           = $request->telepon;
    $input['status']            = 0;
    $input['password']          = Hash::make($request->password);
    $input['role']              = "user";
    $input['remember_token']    = Str::random(60);

    // dd($input);
    $input->save();

        return redirect('/halaman_tambah');
    }

    public function all_user(Type $var = null)
    {
        $team = User::all()->where('status',1);
        return view('admin.all_user',compact('team'));
    }



    public function edit_user($id)
    {
        $user = User::find($id);
        return view('admin.edit_user',compact('user'));
    }



    public function update_user(Request $request, $id)
    {
        // validase inputan
        $request->validate([
            'name'=>'required',
            'email'=> 'required',
            'password'=> 'required',
        ]);

        
        $admin=User::find($id);
            
            // input data update user yang baru
            $admin->name            = $request->name;
            $admin->email           = $request->email;
            $admin->telepon         = $request->telepon;
            $admin->status          = 1;
            $admin->password        = Hash::make($request->password);
            $admin->remember_token  = Str::random(60);
            $admin->save();
            

            return redirect('/all_user');
            // return redirect()->route('edit.user')->with('success','Data Admin Berhasil di Update');

            
    }

    public function konfirmasi()
    {
        $user = User::all()->where('status',0);

        $empty ='-- Data Tidak Tersedia --';

        return view('admin.permintaan_user', compact ('user','empty'));
    }

    
    public function destroy($id)
    {
        // menghapus data petani mendaftar
        $hapus =User::find($id);
        $hapus->delete();

        return redirect()->route('konfirmasi')->with('success','User berhasil dihapus');
    }

    public function terima($id)
    {
        // menerima data petani daftar
        $terima= User::findOrFail($id);
            $terima->status= 1;
            $terima->update();

        return redirect()->route('konfirmasi')->with('success','User berhasil dikonfirmasi');
    }

}
