<?php

namespace App\Http\Controllers;
use App\Models\Sellin;
use DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\SellinImport;
use Auth;
use Validator;
use Illuminate\Support\Str;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $data = Sellin::select ('dest_region',DB::raw('COUNT(dest_saldomobo_id) as outlet'))
        ->GroupBy ('dest_region')
        ->get();
       
        // if($request->tahun==0)
        // $tahun = Date('Y');
        // $tahun = $request->tahun;
        return view('menu.dashboard',compact('data'));
    }

    public function filter(Request $request){
        if($request->select=="area"){
            $data = Sellin::select ('dest_area',DB::raw('COUNT(dest_saldomobo_id) as outlet'))
            ->GroupBy ('dest_area')
            ->get();

        }elseif ($request->select=="sales_area") {
            $data = Sellin::select ('dest_sales_area',DB::raw('COUNT(dest_saldomobo_id) as outlet'))
            ->GroupBy ('dest_sales_area')
            ->get();

        }elseif ($request->select=="cluster") {
            $data = Sellin::select ('dest_cluster',DB::raw('COUNT(dest_saldomobo_id) as outlet'))
            ->GroupBy ('dest_cluster')
            ->get();

        }elseif ($request->select=="micro_cluster") {
            $data = Sellin::select ('dest_micro_cluster',DB::raw('COUNT(dest_saldomobo_id) as outlet'))
            ->GroupBy ('dest_micro_cluster')
            ->get();

        } else{
            $data = Sellin::select ('dest_region',DB::raw('COUNT(dest_saldomobo_id) as outlet'))
        ->GroupBy ('dest_region')
        ->get();
        }
        // dd($request);
        return $data;
    }

    public function sell_in()
    {
        $data = Sellin::select ('created_at','dest_saldomobo_id', 'dest_cluster', 'produk_name',DB::raw('SUM(qty) as qty'))
        ->GroupBy ('created_at','dest_saldomobo_id','produk_name','dest_cluster')
        ->get();
       
        return view('menu.sell_in', compact('data'));
    }



    public function detail($id)
    {
            $data_sellin = Sellin::where('dest_saldomobo_id',$id)->get();
            return view('menu.detail_sell', compact('data_sellin'));
            // return view('menu.detail_sell');
    }



    public function detail_item($id)
    {
            $data_sellin = Sellin::find($id);
            $empty = "- Data Tidak Tersedia -";
            // dd($data_sellin);
            return view('menu.detail_item',compact('data_sellin','empty'));
    }



    public function upload()
    {
            return view('menu.upload');
    }



    public function uploadFile()
    {
        Excel::import(new SellinImport, request()->file('file'));
        // dd($Excel);
        return redirect()->back();
            // return redirect('menu.upload');
    }


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