<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Auth;
use Carbon\Carbon;
use Validator;
use Illuminate\Support\Str;

class ProfilUserController extends Controller
{
    public function profile()
    {

        return view('menu.profile');
    }


    public function profile_update(Request $request, $id)
    {
        // validase inputan
        $request->validate([
            'name'=>'required',
            'email'=> 'required',
        ]);

        //  mencari user sesuai authentikasi user yang ada
        $user=User::find(Auth()->user()->id);
            
            // input data update user yang baru
            $user->name            = $request->name;
            $user->email           = $request->email;
            $user->password        = Hash::make($request->password);
            $user->remember_token  = Str::random(60);
            $user->save();
            

            return redirect()->route('profile')->with('success','Data Admin Berhasil di Update');
    }
}
