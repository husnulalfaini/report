<?php

namespace App\Http\Controllers;
use App\Models\Sellin;
use DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\SellinImport;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function sell_in()
    {
        $data = Sellin::select ('transaction_datetimes','dest_saldomobo_id', 'dest_cluster', 'produk_name',DB::raw('SUM(qty) as qty'))
        ->GroupBy ('transaction_datetimes','dest_saldomobo_id','produk_name','dest_cluster')
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
}