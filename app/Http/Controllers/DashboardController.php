<?php

namespace App\Http\Controllers;
use App\Models\SellIn;
use App\Models\Outletpjp;
use DB;
use Carbon\Carbon;
use Validator;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // $date = Carbon::now();
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


        // $data = DB::table('sell_ins')
        // ->select('sell_ins.transaction_datetimes as transaction_datetimes','sell_ins.dest_cluster as dest_cluster',DB::raw('COUNT(sell_ins.dest_saldomobo_id) as outlet'))
        // ->join('outletpjps','outletpjps.id_outlet','=','sell_ins.dest_saldomobo_id')
        // // ->where('sell_ins.dest_saldomobo_id','=','outletpjps.id_outlet')
        // ->GroupBy ('sell_ins.dest_cluster','sell_ins.transaction_datetimes')
        // ->get();


        // $data_all = DB::table("oultetpjps")
        // ->select("oultetpjps.area",
        //           DB::raw("(SELECT COUNT(sell_ins.dest_saldomobo_id) FROM sell_ins
        //                       WHERE sell_ins.dest_saldomobo_id = outletpjps.id_outlet
        //                       GROUP BY sell_ins.transaction_datetimes) as outlet"))
        // ->get();



        // $data_all = DB::table("sell_ins")
        // ->select('transaction_datetimes','dest_region',

        //           DB::raw(('COUNT(dest_saldomobo_id) as outlet')
        //           ->whereIn('dest_saldomobo_id', function($query)
        //           {
        //               $query->select('id_outlet')
        //                   ->from('outletpjps')
        //                   ->whereRaw('outletpjps.id_outlet = sell_ins.dest_saldomobo_id');
        //           })
        //           ->GroupBy('dest_region','transaction_datetimes')),

        //           DB::raw(('COUNT(dest_saldomobo_id) as sp0k')
        //             ->where('produk_name', "SP IM3 90D LTE (QN)")
        //             ->where('qty','>', 4)
        //             ->whereIn('dest_saldomobo_id', function($query)
        //             {
        //                 $query->select('id_outlet')
        //                     ->from('outletpjps')
        //                     ->whereRaw('outletpjps.id_outlet = sell_ins.dest_saldomobo_id');
        //             })
        //             ->GroupBy('dest_cluster','transaction_datetimes'))
        //             )
        // ->get();
        if($request->input ('datepicker') == null){
            $tanggal  = Date("Y-m-d",strtotime('now'));
        }
        else {

            $tanggal = '01-'.$request->datepicker;
        }

        $awalbulanini= date('Y-m-d',strtotime("first day of " . $tanggal));
        $akhirbulanini= date('Y-m-d',strtotime("last day of " . $tanggal));
        $bulankemarin= date('Y-m-d',strtotime($awalbulanini. " -1 month"));

        
        // Menampilkan jumlah outlet pjp
        $data= DB::table('sell_ins')
        ->select('transaction_datetimes as tanggal','dest_cluster as cluster')
        ->where('transaction_datetimes','>=', $awalbulanini)
        ->where('transaction_datetimes','<=', $akhirbulanini)
        ->whereIn('dest_saldomobo_id', function($query)
        {
            $query->select('id_outlet')
            ->from('outletpjps')
            ->whereRaw('outletpjps.id_outlet = sell_ins.dest_saldomobo_id');
        })
        ->GroupBy('dest_cluster','transaction_datetimes')
        ->get();
        
        // dd($data);

        
        $result= [];
        foreach ($data as $key => $value) {
            
            $outlet_pjp= SellIn::where('transaction_datetimes',$value->tanggal)->where('dest_cluster',$value->cluster)->whereIn('dest_saldomobo_id', function($query)
            {
                $query->select('id_outlet')
                    ->from('outletpjps')
                    ->whereRaw('outletpjps.id_outlet = sell_ins.dest_saldomobo_id');
            })
            ->get()
            ->count();

            $outlet_sp0k =  SellIn::where('transaction_datetimes',$value->tanggal)
            ->where('dest_cluster',$value->cluster)
            ->where('produk_name', "SP IM3 90D LTE (QN)")
            ->where('qty','>', 4)
            ->whereIn('dest_saldomobo_id', function($query)
            {
                $query->select('id_outlet')
                    ->from('outletpjps')
                    ->whereRaw('outletpjps.id_outlet = sell_ins.dest_saldomobo_id');
            })
            ->get()
            ->count();

        
            $outlet_sp0k =  SellIn::where('transaction_datetimes',$value->tanggal)
            ->where('dest_cluster',$value->cluster)
            ->where('produk_name', "SP IM3 90D LTE (QN)")
            ->where('qty','>', 4)
            ->whereIn('dest_saldomobo_id', function($query)
            {
                $query->select('id_outlet')
                    ->from('outletpjps')
                    ->whereRaw('outletpjps.id_outlet = sell_ins.dest_saldomobo_id');
            })
            ->get()
            ->count();


            $outlet_sp3gb =  SellIn::where('transaction_datetimes',$value->tanggal)
            ->where('dest_cluster',$value->cluster)
            ->where('produk_name', "SP DATA 3GB EJBN")
            ->where('qty','>', 4)
            ->whereIn('dest_saldomobo_id', function($query)
            {
                $query->select('id_outlet')
                    ->from('outletpjps')
                    ->whereRaw('outletpjps.id_outlet = sell_ins.dest_saldomobo_id');
            })
            ->get()
            ->count();


            $outlet_sp9gb =  SellIn::where('transaction_datetimes',$value->tanggal)
            ->where('dest_cluster',$value->cluster)
            ->where('produk_name', "SP DATA 9GB EJBN")
            ->where('qty','>', 1)
            ->whereIn('dest_saldomobo_id', function($query)
            {
                $query->select('id_outlet')
                    ->from('outletpjps')
                    ->whereRaw('outletpjps.id_outlet = sell_ins.dest_saldomobo_id');
            })
            ->get()
            ->count();

            $outlet_sp9gb =  SellIn::where('transaction_datetimes',$value->tanggal)
            ->where('dest_cluster',$value->cluster)
            ->where('produk_name', "SP DATA 9GB EJBN")
            ->where('qty','>', 1)
            ->whereIn('dest_saldomobo_id', function($query)
            {
                $query->select('id_outlet')
                    ->from('outletpjps')
                    ->whereRaw('outletpjps.id_outlet = sell_ins.dest_saldomobo_id');
            })
            ->get()
            ->count();




            $spreg_today =  SellIn::where('transaction_datetimes',$value->tanggal)
            ->where('dest_cluster',$value->cluster)
            ->where('produk_name', "SP IM3 90D LTE (QN)")
            ->where('transaction_datetimes','>=', $awalbulanini)
            ->sum('qty')
            ;


            $spori_today =  SellIn::where('transaction_datetimes',$value->tanggal)
            ->where('dest_cluster',$value->cluster)
            ->where('transaction_datetimes','>=', $awalbulanini)
            ->where(function($query)
                {
                    $query->where('produk_name', "SP DAT 16GB EJBN LTE")
                    ->orWhere('produk_name',  "SP DAT 2GB EJBN LTE")
                    ->orWhere('produk_name',  "SP DAT 2GB EJBN LTE")
                    ->orWhere('produk_name',  "SP DAT 8GB EJBN LTE") 
                    ->orWhere('produk_name', "SP DATA 3GB EJBN") 
                    ->orWhere('produk_name', "SP DAT 9GB EJBN");
                })
            ->sum('qty');


            // $spreg_last =  SellIn::where('transaction_datetimes',$value->tanggal)
            $spreg_last =  SellIn::where('dest_cluster',$value->cluster)
            ->where('produk_name', "SP IM3 90D LTE (QN)")
            ->where('transaction_datetimes','>=', $bulankemarin)
            ->where('transaction_datetimes','<', $awalbulanini)
            ->sum('qty');


            // $spori_last =  SellIn::where('transaction_datetimes',$value->tanggal)
            $spori_last =  SellIn::where('dest_cluster',$value->cluster)
            ->where('transaction_datetimes','>=', $bulankemarin)
            ->where('transaction_datetimes','<', $awalbulanini)
            ->where(function($query)
                {
                    $query->where('produk_name', "SP DAT 16GB EJBN LTE")
                    ->orWhere('produk_name',  "SP DAT 2GB EJBN LTE")
                    ->orWhere('produk_name',  "SP DAT 2GB EJBN LTE")
                    ->orWhere('produk_name',  "SP DAT 8GB EJBN LTE") 
                    ->orWhere('produk_name', "SP DATA 3GB EJBN") 
                    ->orWhere('produk_name', "SP DAT 9GB EJBN");
                })
            ->sum('qty');
            
            $result[]=[
                'tanggal'=>$value->tanggal,
                'cluster'=>$value->cluster,
                'outlet'=>$outlet_pjp,
                'outlet_sp0k'=>$outlet_sp0k,
                'ach_sp0k'=>$outlet_sp0k/$outlet_pjp,
                'outlet_sp3gb'=>$outlet_sp3gb,
                'ach_sp3gb'=>$outlet_sp3gb/$outlet_pjp,
                'outlet_sp9gb'=>$outlet_sp9gb,
                'ach_sp9gb'=>$outlet_sp9gb/$outlet_pjp,
                'spori_today'=>$spori_today,
                'spreg_today'=>$spreg_today,
                'spori_last'=>$spori_last,
                'spreg_last'=>$spreg_last,
                'spori_growth'=>$spori_today==0||$spori_last==0?0:$spori_today/$spori_last-1,
                'spreg_growth'=>$spreg_today==0||$spreg_last==0?0:$spreg_today/$spreg_last-1,
        
        ];
        }

        // dd($bulankemarin);
        // $users = User::whereIn('id', array(1, 2, 3))->get();

        
        

        // $data= DB::table('sell_ins')
        // ->select('transaction_datetimes as tanggal','dest_cluster as cluster',DB::raw('COUNT(dest_saldomobo_id) as outlet'))
        // ->whereIn('dest_saldomobo_id', function($query)
        // {
        //     $query->select('id_outlet')
        //         ->from('outletpjps')
        //         ->whereRaw('outletpjps.id_outlet = sell_ins.dest_saldomobo_id');
        // })
        // ->GroupBy('dest_cluster','transaction_datetimes')
        // ->get();

        
        // // // Menampilkan data outlet sp 0k min 5 pcs
        // $data_sp0k= DB::table('sell_ins')
        // ->select('transaction_datetimes','dest_cluster',DB::raw('COUNT(dest_saldomobo_id) as sp0k'))
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

        // // // Menampilkan data outlet sp 3gb min 5 pcs
        // $data_sp3gb= DB::table('sell_ins')
        // ->select('transaction_datetimes','dest_cluster',DB::raw('COUNT(dest_saldomobo_id) as sp3gb'))
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

        // // // Menampilkan data outlet sp 9gb min 2 pcs
        // $data_sp9gb= DB::table('sell_ins')
        // ->select('transaction_datetimes','dest_cluster',DB::raw('COUNT(dest_saldomobo_id) as sp9gb'))
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

        // // // Menampilkan data total sp reg bulan juli
        // $data_spreg= DB::table('sell_ins')
        // ->select('transaction_datetimes','dest_cluster',DB::raw('COUNT(qty) as spreg'))
        // ->where('produk_name', "SP IM3 90D LTE (QN)")
        // ->GroupBy('dest_cluster','transaction_datetimes')
        // ->get();


        // // // Menampilkan data total sp ori bulan juli
        // $data_spori= DB::table('sell_ins')
        // ->select('transaction_datetimes','dest_cluster',DB::raw('SUM(qty) as spori'))
        // ->whereMonth('transaction_datetimes', '08')
        // ->where('produk_name', "SP DAT 16GB EJBN LTE") 
        // ->orWhere('produk_name',  "SP DAT 2GB EJBN LTE") 
        // ->orWhere('produk_name',  "SP DAT 8GB EJBN LTE") 
        // ->orWhere('produk_name', "SP DATA 3GB EJBN") 
        // ->orWhere('produk_name', "SP DAT 9GB EJBN") 
        // ->GroupBy('dest_cluster','transaction_datetimes')
        // ->get();


        // dd($data_spori);

        // $tanggal = [];
        // $region = [];
        // $outlet_pjp = [];
        // $sp0k = [];
        // $sp3gb = [];
        // $sp9gb = [];
        // $spreg = [];
        // $spori = [];
        // foreach ($data as $pjp){
        //     $tanggal[]= $pjp->tanggal;
        //     $region[]= $pjp->region;
        //     $outlet_pjp[]= (float)$pjp->outlet;

        // }
        
        // foreach ($data_sp0k as $data){
        //     $sp0k[]= (float)$data->sp0k;
        // }
        // foreach ($data_sp3gb as $data){
        //     $sp3gb[]= (float)$data->sp3gb;
        // }
        // foreach ($data_sp9gb as $data){
        //     $sp9gb[]= (float)$data->sp9gb;
        // }
        // foreach ($data_spreg as $data){
        //     $spreg[]= (float)$data->spreg;
        // }
        // foreach ($data_spori as $data){
        //     $spori[]= (float)$data->spori;
        // }
            // dd($data_all);
        // dd($data,$data_sp0k,$data_sp3gb,$data_sp9gb,$data_spreg);

        return view('menu.dashboard',['result'=>$result]);
        // return view('menu.dashboard',compact('data', 'data_sp0k','data_sp3gb','data_sp9gb','data_spreg','data_spori'));
    }

    public function datadash($filter)
    {
        // Menampilkan jumlah outlet pjp
        $data= DB::table('sell_ins')
        ->select('transaction_datetimes',$filter,DB::raw('COUNT(dest_saldomobo_id) as outlet'))
        ->whereIn('dest_saldomobo_id', function($query)
        {
            $query->select('id_outlet')
                ->from('outletpjps')
                ->whereRaw('outletpjps.id_outlet = sell_ins.dest_saldomobo_id');
        })
        ->GroupBy($filter,'transaction_datetimes')
        ->get();

        return $data;
    }
    
    public function datasp0k($filter)
    {
        // Menampilkan data outlet sp 0k min 5 pcs
        $data_sp0k= DB::table('sell_ins')
        ->select('transaction_datetimes',$filter,DB::raw('COUNT(dest_saldomobo_id) as outlet'))
        ->where('produk_name', "SP IM3 90D LTE (QN)")
        ->where('qty','>', 4)
        ->whereIn('dest_saldomobo_id', function($query)
        {
            $query->select('id_outlet')
                ->from('outletpjps')
                ->whereRaw('outletpjps.id_outlet = sell_ins.dest_saldomobo_id');
        })
        ->GroupBy($filter,'transaction_datetimes')
        ->get();

        return $data_sp0k;
    }


    public function datasp3gb($filter)
    {
        
        // Menampilkan data outlet sp 3gb min 5 pcs
        $data_sp3gb= DB::table('sell_ins')
        ->select('transaction_datetimes',$filter,DB::raw('COUNT(dest_saldomobo_id) as outlet'))
        ->where('produk_name', "SP DATA 3GB EJBN")
        ->where('qty','>', 4)
        ->whereIn('dest_saldomobo_id', function($query)
        {
            $query->select('id_outlet')
                ->from('outletpjps')
                ->whereRaw('outletpjps.id_outlet = sell_ins.dest_saldomobo_id');
        })
        ->GroupBy($filter,'transaction_datetimes')
        ->get();

        return $data_sp3gb;
    }


    public function datasp9gb($filter)
    {
        
        // Menampilkan data outlet sp 9gb min 2 pcs
        $data_sp9gb= DB::table('sell_ins')
        ->select('transaction_datetimes',$filter,DB::raw('COUNT(dest_saldomobo_id) as outlet'))
        ->where('produk_name', "SP DATA 9GB EJBN")
        ->where('qty','>', 1)
        ->whereIn('dest_saldomobo_id', function($query)
        {
            $query->select('id_outlet')
                ->from('outletpjps')
                ->whereRaw('outletpjps.id_outlet = sell_ins.dest_saldomobo_id');
        })
        ->GroupBy($filter,'transaction_datetimes')
        ->get();

        return $data_sp9gb;
    }

    public function dataspreg($filter)
    {
        
        // Menampilkan data total sp reg bulan juli
        $data_spreg= DB::table('sell_ins')
        ->select($filter,DB::raw('COUNT(qty) as total'))
        ->where('produk_name', "SP IM3 90D LTE (QN)")
        ->whereMonth('transaction_datetimes', '08')
        ->GroupBy($filter)
        ->get();

        return $data_spreg;
    }


    public function dataspori($filter)
    {
        // Menampilkan data total sp ori bulan juli
        $data_spori= DB::table('sell_ins')
        ->select($filter,DB::raw('SUM(qty) as total'))
        // ->whereMonth('transaction_datetimes', '<=', $date)
        ->whereMonth('transaction_datetimes', '08')
        ->where('produk_name', "SP DAT 16GB EJBN LTE") 
        ->orWhere('produk_name',  "SP DAT 2GB EJBN LTE") 
        ->orWhere('produk_name',  "SP DAT 8GB EJBN LTE") 
        ->orWhere('produk_name', "SP DATA 3GB EJBN") 
        ->orWhere('produk_name', "SP DAT 9GB EJBN") 
        ->GroupBy($filter)
        ->get();

        return $data_spori;
    }
        
    

    public function filter(Request $request)
    {
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

                // Menampilkan jumlah outlet pjp
                // $data= DB::table('sell_ins')
                // ->select('transaction_datetimes as tanggal','dest_cluster as cluster',DB::raw('COUNT(dest_saldomobo_id) as outlet'))
                // ->whereIn('dest_saldomobo_id', function($query)
                // {
                //     $query->select('id_outlet')
                //         ->from('outletpjps')
                //         ->whereRaw('outletpjps.id_outlet = sell_ins.dest_saldomobo_id');
                // })
                // ->GroupBy('dest_cluster','transaction_datetimes')
                // ->get();
        
                
                // // Menampilkan data outlet sp 0k min 5 pcs
                // $data_sp0k= DB::table('sell_ins')
                // ->select('transaction_datetimes','dest_cluster',DB::raw('COUNT(dest_saldomobo_id) as sp0k'))
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
        
                // // Menampilkan data outlet sp 3gb min 5 pcs
                // $data_sp3gb= DB::table('sell_ins')
                // ->select('transaction_datetimes','dest_cluster',DB::raw('COUNT(dest_saldomobo_id) as sp3gb'))
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
        
                // // Menampilkan data outlet sp 9gb min 2 pcs
                // $data_sp9gb= DB::table('sell_ins')
                // ->select('transaction_datetimes','dest_cluster',DB::raw('COUNT(dest_saldomobo_id) as sp9gb'))
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
        
                // // Menampilkan data total sp reg bulan juli
                // $data_spreg= DB::table('sell_ins')
                // ->select('transaction_datetimes','dest_cluster',DB::raw('COUNT(qty) as spreg'))
                // ->where('produk_name', "SP IM3 90D LTE (QN)")
                // ->GroupBy('dest_cluster','transaction_datetimes')
                // ->get();
        
        
                // // Menampilkan data total sp ori bulan juli
                // $data_spori= DB::table('sell_ins')
                // ->select('transaction_datetimes','dest_cluster',DB::raw('SUM(qty) as spori'))
                // ->whereMonth('transaction_datetimes', '08')
                // ->where('produk_name', "SP DAT 16GB EJBN LTE") 
                // ->orWhere('produk_name',  "SP DAT 2GB EJBN LTE") 
                // ->orWhere('produk_name',  "SP DAT 8GB EJBN LTE") 
                // ->orWhere('produk_name', "SP DATA 3GB EJBN") 
                // ->orWhere('produk_name', "SP DAT 9GB EJBN") 
                // ->GroupBy('dest_cluster','transaction_datetimes')
                // ->get();

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
     
    }


    
}