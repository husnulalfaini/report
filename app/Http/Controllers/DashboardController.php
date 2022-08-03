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
use Carbon\Carbon;
use Validator;
use Illuminate\Support\Str;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $date = Carbon::now();
        // $date = Carbon::parse($current_date)->AddMonths(1)->format('d-m-Y');
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
        // $data = DB::table('sell_ins')
        // ->select('sell_ins.transaction_datetimes as transaction_datetimes','sell_ins.dest_cluster as dest_cluster',DB::raw('COUNT(sell_ins.dest_saldomobo_id) as outlet'))
        // ->join('outletpjps','outletpjps.id_outlet','=','sell_ins.dest_saldomobo_id')
        // // ->where('sell_ins.dest_saldomobo_id','=','outletpjps.id_outlet')
        // ->GroupBy ('sell_ins.dest_cluster','sell_ins.transaction_datetimes')
        // ->get();

        // Menampilkan jumlah outlet pjp
        // $data= DB::table('sell_ins')
        // ->select('transaction_datetimes','dest_region',DB::raw('COUNT(dest_saldomobo_id) as outlet'))
        // ->whereIn('dest_saldomobo_id', function($query)
        // {
        //     $query->select('id_outlet')
        //         ->from('outletpjps')
        //         ->whereRaw('outletpjps.id_outlet = sell_ins.dest_saldomobo_id');
        // })
        // ->GroupBy('dest_region','transaction_datetimes')
        // ->get();

        
        // Menampilkan data outlet sp 0k min 5 pcs
        // $data_sp0k= DB::table('sell_ins')
        // ->select('transaction_datetimes','dest_cluster',DB::raw('COUNT(dest_saldomobo_id) as outlet'))
        // ->where('produk_name', "SP IM3 90D LTE (QN)")
        // ->where('qty','>', 4)
        // ->whereIn('dest_saldomobo_id', function($query)
        // {
        //     $query->select('id_outlet')
        //         ->from('outletpjps')
        //         ->whereRaw('outletpjps.id_outlet = sell_ins.dest_saldomobo_id');
        // })
        // ->GroupBy('dest_cluster','transaction_datetimes')
        // ->get();



        // Menampilkan data outlet sp 3gb min 5 pcs
        // $data_sp3gb= DB::table('sell_ins')
        // ->select('transaction_datetimes','dest_cluster',DB::raw('COUNT(dest_saldomobo_id) as outlet'))
        // ->where('produk_name', "SP DATA 3GB EJBN")
        // ->where('qty','>', 4)
        // ->whereIn('dest_saldomobo_id', function($query)
        // {
        //     $query->select('id_outlet')
        //         ->from('outletpjps')
        //         ->whereRaw('outletpjps.id_outlet = sell_ins.dest_saldomobo_id');
        // })
        // ->GroupBy('dest_cluster','transaction_datetimes')
        // ->get();


        // dd($data_sp3gb);



        // Menampilkan data outlet sp 9gb min 2 pcs
        // $data_sp9gb= DB::table('sell_ins')
        // ->select('transaction_datetimes','dest_cluster',DB::raw('COUNT(dest_saldomobo_id) as outlet'))
        // ->where('produk_name', "SP DATA 9GB EJBN")
        // ->where('qty','>', 1)
        // ->whereIn('dest_saldomobo_id', function($query)
        // {
        //     $query->select('id_outlet')
        //         ->from('outletpjps')
        //         ->whereRaw('outletpjps.id_outlet = sell_ins.dest_saldomobo_id');
        // })
        // ->GroupBy('dest_cluster','transaction_datetimes')
        // ->get();





        // Menampilkan data total sp reg bulan juli
        // $data_spreg= DB::table('sell_ins')
        // ->select('transaction_datetimes','dest_cluster',DB::raw('COUNT(qty) as total'))
        // ->where('produk_name', "SP IM3 90D LTE (QN)")
        // ->whereMonth('transaction_datetimes', '08')
        // ->GroupBy('dest_cluster','transaction_datetimes')
        // ->get();


        // Menampilkan data total sp ori bulan juli
        $data_spori= DB::table('sell_ins')
        ->select('dest_cluster',DB::raw('SUM(qty) as total'))
        // ->whereMonth('transaction_datetimes', '<=', $date)
        // ->whereMonth('transaction_datetimes', '08')
        ->whereMonth('transaction_datetimes', '08')
        ->where('produk_name', "SP DAT 16GB EJBN LTE") 
        ->orWhere('produk_name',  "SP DAT 2GB EJBN LTE") 
        ->orWhere('produk_name',  "SP DAT 8GB EJBN LTE") 
        ->orWhere('produk_name', "SP DATA 3GB EJBN") 
        ->orWhere('produk_name', "SP DAT 9GB EJBN") 
        ->GroupBy('dest_cluster')
        ->get();


        dd($data_spori);


        return view('menu.dashboard',compact('data'));
    }

    public function filter(Request $request){
        if($request->select=="area"){
            $data= DB::table('sell_ins')
        ->select('transaction_datetimes','dest_area',DB::raw('COUNT(dest_saldomobo_id) as outlet'))
        ->whereIn('dest_saldomobo_id', function($query)
        {
            $query->select('id_outlet')
                ->from('outletpjps')
                ->whereRaw('outletpjps.id_outlet = sell_ins.dest_saldomobo_id');
        })
        ->GroupBy('dest_area','transaction_datetimes')
        ->get();

        }elseif ($request->select=="sales_area") {
        $data= DB::table('sell_ins')
        ->select('transaction_datetimes','dest_sales_area',DB::raw('COUNT(dest_saldomobo_id) as outlet'))
        ->whereIn('dest_saldomobo_id', function($query)
        {
            $query->select('id_outlet')
                ->from('outletpjps')
                ->whereRaw('outletpjps.id_outlet = sell_ins.dest_saldomobo_id');
        })
        ->GroupBy('dest_sales_area','transaction_datetimes')
        ->get();

        }elseif ($request->select=="cluster") {
            $data= DB::table('sell_ins')
            ->select('transaction_datetimes','dest_cluster',DB::raw('COUNT(dest_saldomobo_id) as outlet'))
            ->whereIn('dest_saldomobo_id', function($query)
            {
                $query->select('id_outlet')
                    ->from('outletpjps')
                    ->whereRaw('outletpjps.id_outlet = sell_ins.dest_saldomobo_id');
            })
            ->GroupBy('dest_cluster','transaction_datetimes')
            ->get();

        }elseif ($request->select=="micro_cluster") {
            $data= DB::table('sell_ins')
            ->select('transaction_datetimes','dest_micro_cluster',DB::raw('COUNT(dest_saldomobo_id) as outlet'))
            ->whereIn('dest_saldomobo_id', function($query)
            {
                $query->select('id_outlet')
                    ->from('outletpjps')
                    ->whereRaw('outletpjps.id_outlet = sell_ins.dest_saldomobo_id');
            })
            ->GroupBy('dest_micro_cluster','transaction_datetimes')
            ->get();

        } else{
            $data= DB::table('sell_ins')
        ->select('transaction_datetimes','dest_region',DB::raw('COUNT(dest_saldomobo_id) as outlet'))
        ->whereIn('dest_saldomobo_id', function($query)
        {
            $query->select('id_outlet')
                ->from('outletpjps')
                ->whereRaw('outletpjps.id_outlet = sell_ins.dest_saldomobo_id');
        })
        ->GroupBy('dest_region','transaction_datetimes')
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
            return view('menu.upload')->with('error', 'Email atau Password Anda Salah!!');
    }



    public function uploadFile()
    {
        Excel::import(new SellinImport, request()->file('file'));
        // dd($Excel);
        return redirect()->back()->with('success', 'Data Baru Berhasil Ditambahkan!');
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