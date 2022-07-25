<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function halaman_tambah(Type $var = null)
    {
        return view('admin.halaman_tambah');
    }


    public function tambah_user(Type $var = null)
    {
        return view('admin.halaman_tambah');
    }
}
