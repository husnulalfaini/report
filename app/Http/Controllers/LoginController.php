<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function login_page(Type $var = null)
    {
        return view ('regis.login');
    }

    public function login(Request $request)
    {   
        // if(Auth::attempt($request->only('email','password')))
        if($auth=Auth::attempt($request->only('email','password')))
        {
            if (auth()->user()->role=="user") {
                return view('menu.upload');
            } else {
                return view('admin.halaman_tambah');
            }  
        }
        dd($auth);
            return redirect('/')->with('error', 'Email atau Password Anda Salah!!');

    }


    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function tampilRegister(){
        return view('regis.register');
    }

    public function regis(Request $request)
{    
    // melalukan validasi
    $validator = Validator::make($request->all(), [
        'email'     =>'unique:users',
    ]);

    //pengondisian error
    if ($validator->fails()) {
        return redirect('/register')->with('error', 'admin sudah ada, masukan pengguna lain!');               
    }
    
    // input data baru kedalam tabel user
    $input = new User();
    $input['name']              = $request->name;
    $input['email']             = $request->email;
    $input['password']          = Hash::make($request->password);
    $input['role']              = $request->role;
    $input['remember_token']    = Str::random(60);

    // dd($input);
    $input->save();

    return redirect('/')->with('success', 'User Baru Berhasil Ditambahkan!');
}
}
