<?php

namespace App\Http\Controllers;
use App\Models\Sellin;
use App\Models\Outletpjp;
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
        // $data = Sellin::select ('transaction_datetimes','dest_region',DB::raw('COUNT(dest_saldomobo_id) as outlet'))
        // ->GroupBy ('dest_region','transaction_datetimes')
        // ->get();

        // $data = Sellin::select('sell_ins.transaction_datetimes as transaction_datetimes','sell_ins.dest_region as dest_region',DB::raw('SUM(sell_ins.dest_saldomobo_id) as outlet'))
        // ->join('sell_ins','sell_ins.dest_organizationname','=','outletpjps.outlet_name')
        // ->where('sell_ins.dest_organizationname','outletpjps.outlet_name')
        // ->GroupBy ('sell_ins.dest_region','sell_ins.transaction_datetimes')
        // ->get();
        // $data = Outletpjp::all();
        // $data = DB::table('sell_ins','outletpjps')
        // ->select('sell_ins.transaction_datetimes as transaction_datetimes','sell_ins.dest_cluster as dest_cluster',DB::raw('COUNT(sell_ins.dest_saldomobo_id) as outlet'))
        // ->join('sell_ins','sell_ins.dest_saldomobo_id','=','outletpjps.id_outlet')
        // // ->where('sell_ins.dest_saldomobo_id','=','outletpjps.id_outlet')
        // ->GroupBy ('sell_ins.dest_cluster','sell_ins.transaction_datetimes')
        // ->get();
        // dd($data);
        $data = DB::table('sell_ins')
        ->select('sell_ins.transaction_datetimes as transaction_datetimes','sell_ins.dest_cluster as dest_cluster',DB::raw('COUNT(sell_ins.dest_saldomobo_id) as outlet'))
        ->join('outletpjps','outletpjps.id_outlet','=','sell_ins.dest_saldomobo_id')
        // ->where('sell_ins.dest_saldomobo_id','=','outletpjps.id_outlet')
        ->GroupBy ('sell_ins.dest_cluster','sell_ins.transaction_datetimes')
        ->get();
        dd($data);

    //     DB::select(DB::raw(" 
    // SELECT COUNT(*) AS result
    // FROM some_table"
// ));

        // if($request->tahun==0)
        // $tahun = Date('Y');
        // $tahun = $request->tahun;
        return view('menu.dashboard',compact('data'));
    }

    public function filter(Request $request){
        if($request->select=="area"){
            $data = Sellin::select ('transaction_datetimes','dest_area',DB::raw('COUNT(dest_saldomobo_id) as outlet'))
            ->GroupBy ('transaction_datetimes','dest_area')
            ->get();

        }elseif ($request->select=="sales_area") {
            $data = Sellin::select ('transaction_datetimes','dest_sales_area',DB::raw('COUNT(dest_saldomobo_id) as outlet'))
            ->GroupBy ('transaction_datetimes','dest_sales_area')
            ->get();

        }elseif ($request->select=="cluster") {
            $data = Sellin::select ('transaction_datetimes','dest_cluster',DB::raw('COUNT(dest_saldomobo_id) as outlet'))
            ->GroupBy ('transaction_datetimes','dest_cluster')
            ->get();

        }elseif ($request->select=="micro_cluster") {
            $data = Sellin::select ('transaction_datetimes','dest_micro_cluster',DB::raw('COUNT(dest_saldomobo_id) as outlet'))
            ->GroupBy ('transaction_datetimes','dest_micro_cluster')
            ->get();

        } else{
            $data = Sellin::select ('transaction_datetimes','dest_region',DB::raw('COUNT(dest_saldomobo_id) as outlet'))
        ->GroupBy ('transaction_datetimes','dest_region')
        ->get();
        }
        // dd($request);
        return $data;
    }

    public function sell_in()
    {
        $data = Sellin::select ('transaction_datetimes','dest_saldomobo_id', 'dest_micro_cluster','dest_cluster', 'produk_name',DB::raw('SUM(qty) as qty'))
        ->GroupBy ('transaction_datetimes','dest_saldomobo_id', 'dest_micro_cluster', 'dest_cluster', 'produk_name')
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