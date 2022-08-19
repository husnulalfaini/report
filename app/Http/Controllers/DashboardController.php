<?php

namespace App\Http\Controllers;
use App\Models\SellIn;
use App\Models\Outletpjp;
use DB;
use Carbon\Carbon;
use Validator;
use Illuminate\Support\Str;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // if($request->select=="micro_cluster"){
        
            if ($request->select == null) {
                $dest = 'dest_region';

            //         if($request->input ('datepicker') == null){
            //         $tanggal  = Date("Y-m-d",strtotime('now'));
            //     }
            //     else {

            //         $tanggal = '01-'.$request->datepicker;
            //     }

            //     $awalbulanini= date('Y-m-d',strtotime("first day of " . $tanggal));
            //     $akhirbulanini= date('Y-m-d',strtotime("last day of " . $tanggal));
            //     $bulankemarin= date('Y-m-d',strtotime($awalbulanini. " -1 month"));
            //     // Menampilkan jumlah outlet pjp
            //     $data= DB::table('sell_ins')
            //     ->select('transaction_datetimes as tanggal','dest_cluster as cluster')
            //     ->where('transaction_datetimes','>=', $awalbulanini)
            //     ->where('transaction_datetimes','<=', $akhirbulanini)
            //     ->whereIn('dest_saldomobo_id', function($query)
            //     {
            //         $query->select('id_outlet')
            //         ->from('outletpjps')
            //         ->whereRaw('outletpjps.id_outlet = sell_ins.dest_saldomobo_id');
            //     })
            //     ->GroupBy('dest_cluster','transaction_datetimes')
            //     ->get();
                
            //     // dd($data);

                
            //     $result= [];
            //     foreach ($data as $key => $value) {
                    
            //         $outlet_pjp= SellIn::where('transaction_datetimes',$value->tanggal)->where('dest_cluster',$value->cluster)->whereIn('dest_saldomobo_id', function($query)
            //         {
            //             $query->select('id_outlet')
            //                 ->from('outletpjps')
            //                 ->whereRaw('outletpjps.id_outlet = sell_ins.dest_saldomobo_id');
            //         })
            //         ->get()
            //         ->count();

            //         $outlet_sp0k =  SellIn::where('transaction_datetimes',$value->tanggal)
            //         ->where('dest_cluster',$value->cluster)
            //         ->where('produk_name', "SP IM3 90D LTE (QN)")
            //         ->where('qty','>', 4)
            //         ->whereIn('dest_saldomobo_id', function($query)
            //         {
            //             $query->select('id_outlet')
            //                 ->from('outletpjps')
            //                 ->whereRaw('outletpjps.id_outlet = sell_ins.dest_saldomobo_id');
            //         })
            //         ->get()
            //         ->count();

                
            //         $outlet_sp0k =  SellIn::where('transaction_datetimes',$value->tanggal)
            //         ->where('dest_cluster',$value->cluster)
            //         ->where('produk_name', "SP IM3 90D LTE (QN)")
            //         ->where('qty','>', 4)
            //         ->whereIn('dest_saldomobo_id', function($query)
            //         {
            //             $query->select('id_outlet')
            //                 ->from('outletpjps')
            //                 ->whereRaw('outletpjps.id_outlet = sell_ins.dest_saldomobo_id');
            //         })
            //         ->get()
            //         ->count();


            //         $outlet_sp3gb =  SellIn::where('transaction_datetimes',$value->tanggal)
            //         ->where('dest_cluster',$value->cluster)
            //         ->where('produk_name', "SP DATA 3GB EJBN")
            //         ->where('qty','>', 4)
            //         ->whereIn('dest_saldomobo_id', function($query)
            //         {
            //             $query->select('id_outlet')
            //                 ->from('outletpjps')
            //                 ->whereRaw('outletpjps.id_outlet = sell_ins.dest_saldomobo_id');
            //         })
            //         ->get()
            //         ->count();


            //         $outlet_sp9gb =  SellIn::where('transaction_datetimes',$value->tanggal)
            //         ->where('dest_cluster',$value->cluster)
            //         ->where('produk_name', "SP DATA 9GB EJBN")
            //         ->where('qty','>', 1)
            //         ->whereIn('dest_saldomobo_id', function($query)
            //         {
            //             $query->select('id_outlet')
            //                 ->from('outletpjps')
            //                 ->whereRaw('outletpjps.id_outlet = sell_ins.dest_saldomobo_id');
            //         })
            //         ->get()
            //         ->count();

            //         $outlet_sp9gb =  SellIn::where('transaction_datetimes',$value->tanggal)
            //         ->where('dest_cluster',$value->cluster)
            //         ->where('produk_name', "SP DATA 9GB EJBN")
            //         ->where('qty','>', 1)
            //         ->whereIn('dest_saldomobo_id', function($query)
            //         {
            //             $query->select('id_outlet')
            //                 ->from('outletpjps')
            //                 ->whereRaw('outletpjps.id_outlet = sell_ins.dest_saldomobo_id');
            //         })
            //         ->get()
            //         ->count();

            //         $spreg_today =  SellIn::where('transaction_datetimes',$value->tanggal)
            //         ->where('dest_cluster',$value->cluster)
            //         ->where('produk_name', "SP IM3 90D LTE (QN)")
            //         ->where('transaction_datetimes','>=', $awalbulanini)
            //         ->sum('qty')
            //         ;


            //         $spori_today =  SellIn::where('transaction_datetimes',$value->tanggal)
            //         ->where('dest_cluster',$value->cluster)
            //         ->where('transaction_datetimes','>=', $awalbulanini)
            //         ->where(function($query)
            //             {
            //                 $query->where('produk_name', "SP DAT 16GB EJBN LTE")
            //                 ->orWhere('produk_name',  "SP DAT 2GB EJBN LTE")
            //                 ->orWhere('produk_name',  "SP DAT 2GB EJBN LTE")
            //                 ->orWhere('produk_name',  "SP DAT 8GB EJBN LTE") 
            //                 ->orWhere('produk_name', "SP DATA 3GB EJBN") 
            //                 ->orWhere('produk_name', "SP DAT 9GB EJBN");
            //             })
            //         ->sum('qty');


            //         // $spreg_last =  SellIn::where('transaction_datetimes',$value->tanggal)
            //         $spreg_last =  SellIn::where('dest_cluster',$value->cluster)
            //         ->where('produk_name', "SP IM3 90D LTE (QN)")
            //         ->where('transaction_datetimes','>=', $bulankemarin)
            //         ->where('transaction_datetimes','<', $awalbulanini)
            //         ->sum('qty');


            //         // $spori_last =  SellIn::where('transaction_datetimes',$value->tanggal)
            //         $spori_last =  SellIn::where('dest_cluster',$value->cluster)
            //         ->where('transaction_datetimes','>=', $bulankemarin)
            //         ->where('transaction_datetimes','<', $awalbulanini)
            //         ->where(function($query)
            //             {
            //                 $query->where('produk_name', "SP DAT 16GB EJBN LTE")
            //                 ->orWhere('produk_name',  "SP DAT 2GB EJBN LTE")
            //                 ->orWhere('produk_name',  "SP DAT 2GB EJBN LTE")
            //                 ->orWhere('produk_name',  "SP DAT 8GB EJBN LTE") 
            //                 ->orWhere('produk_name', "SP DATA 3GB EJBN") 
            //                 ->orWhere('produk_name', "SP DAT 9GB EJBN");
            //             })
            //         ->sum('qty');


                    
            //         $outlet_fi3gb =  SellIn::where('transaction_datetimes',$value->tanggal)
            //         ->where('dest_cluster',$value->cluster)
            //         ->where('produk_name', "VOU FI3GB/30hr Balnus")
            //         ->where('qty','>', 9)
            //         ->whereIn('dest_saldomobo_id', function($query)
            //         {
            //             $query->select('id_outlet')
            //                 ->from('outletpjps')
            //                 ->whereRaw('outletpjps.id_outlet = sell_ins.dest_saldomobo_id');
            //         })
            //         ->get()
            //         ->count();


            //         $outlet_fi25gb =  SellIn::where('transaction_datetimes',$value->tanggal)
            //         ->where('dest_cluster',$value->cluster)
            //         ->where('produk_name', "VOUCORI FI2.5GB/5D EJBN")
            //         ->where('qty','>', 4)
            //         ->whereIn('dest_saldomobo_id', function($query)
            //         {
            //             $query->select('id_outlet')
            //                 ->from('outletpjps')
            //                 ->whereRaw('outletpjps.id_outlet = sell_ins.dest_saldomobo_id');
            //         })
            //         ->get()
            //         ->count();


            //         $voucer_today =  SellIn::where('transaction_datetimes',$value->tanggal)
            //         ->where('dest_cluster',$value->cluster)
            //         ->where('transaction_datetimes','>=', $awalbulanini)
            //         ->where(function($query)
            //             {
            //                 $query->where('produk_name', "VOU FU 20GB/30hr Jatim Madura")
            //                 ->orWhere('produk_name',  "VORI FI 2GB/3GB 30D JATIM")
            //                 ->orWhere('produk_name',  "VOUCORI FI2.5GB/5D EJBN")
            //                 ->orWhere('produk_name',  "VORI FU 3GB JATIM") 
            //                 ->orWhere('produk_name', "VOU FI3GB/30hr Jatim Madura") 
            //                 ->orWhere('produk_name', "VOU FI Sachet 2.5GB EJBN")
            //                 ->orWhere('produk_name', "VOU FI3GB/30hr Balnus")
            //                 ->orWhere('produk_name', "VORI FI 2GB/3GB 30D BALINUSRA")
            //                 ->orWhere('produk_name', "FI Sachet 2.5GB EJBN")
            //                 ->orWhere('produk_name', "FI3GB/30hr Jatim,Madura")
            //                 ->orWhere('produk_name', "FU 20GB/30hr Jatim,Madura")
            //                 ->orWhere('produk_name', "FI3GB/30hr Balnus")
            //                 ->orWhere('produk_name', "FI3GB/30hr Jatim_New");
            //             })
            //         ->sum('qty');


            //         $voucer_last =  SellIn::where('dest_cluster',$value->cluster)
            //         ->where('transaction_datetimes','>=', $bulankemarin)
            //         ->where('transaction_datetimes','<', $awalbulanini)
            //         ->where(function($query)
            //             {
            //                 $query->where('produk_name', "VOU FU 20GB/30hr Jatim Madura")
            //                 ->orWhere('produk_name',  "VORI FI 2GB/3GB 30D JATIM")
            //                 ->orWhere('produk_name',  "VOUCORI FI2.5GB/5D EJBN")
            //                 ->orWhere('produk_name',  "VORI FU 3GB JATIM") 
            //                 ->orWhere('produk_name', "VOU FI3GB/30hr Jatim Madura") 
            //                 ->orWhere('produk_name', "VOU FI Sachet 2.5GB EJBN")
            //                 ->orWhere('produk_name', "VOU FI3GB/30hr Balnus")
            //                 ->orWhere('produk_name', "VORI FI 2GB/3GB 30D BALINUSRA")
            //                 ->orWhere('produk_name', "FI Sachet 2.5GB EJBN")
            //                 ->orWhere('produk_name', "FI3GB/30hr Jatim,Madura")
            //                 ->orWhere('produk_name', "FU 20GB/30hr Jatim,Madura")
            //                 ->orWhere('produk_name', "FI3GB/30hr Balnus")
            //                 ->orWhere('produk_name', "FI3GB/30hr Jatim_New");
            //             })
            //         ->sum('qty');


                    
            //         $result[]=[
            //             'tanggal'=>$value->tanggal,
            //             'cluster'=>$value->cluster,
            //             'outlet'=>$outlet_pjp,
            //             'ach_sp0k'=>Str::limit($outlet_sp0k/$outlet_pjp*100,4),
            //             'ach_sp3gb'=>Str::limit($outlet_sp3gb/$outlet_pjp*100,4),
            //             'ach_sp9gb'=>Str::limit($outlet_sp9gb/$outlet_pjp*100,4),
            //             'spori_growth'=>Str::limit($spori_today==0||$spori_last==0?0:$spori_today/$spori_last-1*100,4),
            //             'spreg_growth'=>Str::limit($spreg_today==0||$spreg_last==0?0:$spreg_today/$spreg_last-1*100,4),
            //             'ach_fi3gb'=>Str::limit($outlet_fi3gb/$outlet_pjp*100,4),
            //             'ach_fi25gb'=>Str::limit($outlet_fi25gb/$outlet_pjp*100,4),
            //             'vou_growth'=>Str::limit($voucer_today==0||$voucer_last==0?0:$voucer_today/$voucer_last-1*100,4),
                
            //     ];

            // }
            // return view('menu.dashboard.summary',['result'=>$result]);
            
            }
            else{
                $dest = 'dest_'.$request->select;
            }

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
            ->select('transaction_datetimes as tanggal',$dest. " as ".$request->select)
            ->where('transaction_datetimes','>=', $awalbulanini)
            ->where('transaction_datetimes','<=', $akhirbulanini)
            ->whereIn('dest_saldomobo_id', function($query)
            {
                $query->select('id_outlet')
                ->from('outletpjps')
                ->whereRaw('outletpjps.id_outlet = sell_ins.dest_saldomobo_id');
            })
            ->GroupBy($dest,'transaction_datetimes')
            ->get();
            
            // dd($data);
    
            
            $result= [];
            foreach ($data as $key => $value) {
                $destination = $value->{$request->select};

                $outlet_pjp= SellIn::where('transaction_datetimes',$value->tanggal)->where($dest,$destination)->whereIn('dest_saldomobo_id', function($query)
                {
                    $query->select('id_outlet')
                        ->from('outletpjps')
                        ->whereRaw('outletpjps.id_outlet = sell_ins.dest_saldomobo_id');
                })
                ->get()
                ->count();

                // dd($outlet_pjp);

                $outlet_sp0k =  SellIn::where('transaction_datetimes',$value->tanggal)
                ->where($dest,$destination)
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
                ->where($dest,$destination)
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
                ->where($dest,$destination)
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
                ->where($dest,$destination)
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
                ->where($dest,$destination)
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
                ->where($dest,$destination)
                ->where('produk_name', "SP IM3 90D LTE (QN)")
                ->where('transaction_datetimes','>=', $awalbulanini)
                ->sum('qty')
                ;
    
    
                $spori_today =  SellIn::where('transaction_datetimes',$value->tanggal)
                ->where($dest,$destination)
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
                $spreg_last =  SellIn::where($dest,$destination)
                ->where('produk_name', "SP IM3 90D LTE (QN)")
                ->where('transaction_datetimes','>=', $bulankemarin)
                ->where('transaction_datetimes','<', $awalbulanini)
                ->sum('qty');
    
    
                // $spori_last =  SellIn::where('transaction_datetimes',$value->tanggal)
                $spori_last =  SellIn::where($dest,$destination)
                ->where('transaction_datetimes','>=', $bulankemarin)
                ->where('transaction_datetimes','<', $awalbulanini)
                ->where(function($query)
                    {
                        $query->where('produk_name', "SP DAT 16GB EJBN LTE")
                        ->orWhere('produk_name',  "SP DAT 2GB EJBN LTE")
                        ->orWhere('produk_name',  "SP DAT 2GB EJBN LTE")
                        ->orWhere('produk_name',  "SP DAT 8GB EJBN LTE") 
                        ->orWhere('produk_name', "SP DAT 3GB EJBN") 
                        ->orWhere('produk_name', "SP DAT 9GB EJBN");
                    })
                ->sum('qty');
                
                $result[]=[
                    'tanggal'=>$value->tanggal,
                    'destination' =>$value->{$request->select},
                    'outlet'=>$outlet_pjp,
                    'outlet_sp0k'=>$outlet_sp0k,
                    'ach_sp0k'=>Str::limit($outlet_sp0k/$outlet_pjp*100,4),
                    'outlet_sp3gb'=>$outlet_sp3gb,
                    'ach_sp3gb'=>Str::limit($outlet_sp3gb/$outlet_pjp*100,4),
                    'outlet_sp9gb'=>$outlet_sp9gb,
                    'ach_sp9gb'=>Str::limit($outlet_sp9gb/$outlet_pjp*100,4),
                    'spori_today'=>$spori_today,
                    'spreg_today'=>$spreg_today,
                    'spori_last'=>$spori_last,
                    'spreg_last'=>$spreg_last,
                    'spori_growth'=>Str::limit($spori_today==0||$spori_last==0?0:$spori_today/$spori_last-1*100,4),
                    'spreg_growth'=>Str::limit($spreg_today==0||$spreg_last==0?0:$spreg_today/$spreg_last-1*100,4),
            
            ];
        }

        // dd($result);
    
            return view('menu.dashboard.region',['result'=>$result]);
            // return view('menu.dashboard',compact('data', 'data_sp0k','data_sp3gb','data_sp9gb','data_spreg','data_spori'));
            
    //     } elseif ($request->select=="sales_area") {
    
    //         if($request->input ('datepicker') == null){
    //             $tanggal  = Date("Y-m-d",strtotime('now'));
    //         }
    //         else {
    
    //             $tanggal = '01-'.$request->datepicker;
    //         }
    
    //         $awalbulanini= date('Y-m-d',strtotime("first day of " . $tanggal));
    //         $akhirbulanini= date('Y-m-d',strtotime("last day of " . $tanggal));
    //         $bulankemarin= date('Y-m-d',strtotime($awalbulanini. " -1 month"));
    //                     // Menampilkan jumlah outlet pjp
    //         $data= DB::table('sell_ins')
    //         ->select('transaction_datetimes as tanggal','dest_sales_area as sales_area')
    //         ->where('transaction_datetimes','>=', $awalbulanini)
    //         ->where('transaction_datetimes','<=', $akhirbulanini)
    //         ->whereIn('dest_saldomobo_id', function($query)
    //         {
    //             $query->select('id_outlet')
    //             ->from('outletpjps')
    //             ->whereRaw('outletpjps.id_outlet = sell_ins.dest_saldomobo_id');
    //         })
    //         ->GroupBy('dest_sales_area','transaction_datetimes')
    //         ->get();
            
    //         // dd($data);
    
            
    //         $result= [];
    //         foreach ($data as $key => $value) {
                
    //             $outlet_pjp= SellIn::where('transaction_datetimes',$value->tanggal)->where('dest_sales_area',$value->sales_area)->whereIn('dest_saldomobo_id', function($query)
    //             {
    //                 $query->select('id_outlet')
    //                     ->from('outletpjps')
    //                     ->whereRaw('outletpjps.id_outlet = sell_ins.dest_saldomobo_id');
    //             })
    //             ->get()
    //             ->count();
    
    //             $outlet_sp0k =  SellIn::where('transaction_datetimes',$value->tanggal)
    //             ->where('dest_sales_area',$value->sales_area)
    //             ->where('produk_name', "SP IM3 90D LTE (QN)")
    //             ->where('qty','>', 4)
    //             ->whereIn('dest_saldomobo_id', function($query)
    //             {
    //                 $query->select('id_outlet')
    //                     ->from('outletpjps')
    //                     ->whereRaw('outletpjps.id_outlet = sell_ins.dest_saldomobo_id');
    //             })
    //             ->get()
    //             ->count();
    
            
    //             $outlet_sp0k =  SellIn::where('transaction_datetimes',$value->tanggal)
    //             ->where('dest_sales_area',$value->sales_area)
    //             ->where('produk_name', "SP IM3 90D LTE (QN)")
    //             ->where('qty','>', 4)
    //             ->whereIn('dest_saldomobo_id', function($query)
    //             {
    //                 $query->select('id_outlet')
    //                     ->from('outletpjps')
    //                     ->whereRaw('outletpjps.id_outlet = sell_ins.dest_saldomobo_id');
    //             })
    //             ->get()
    //             ->count();
    
    
    //             $outlet_sp3gb =  SellIn::where('transaction_datetimes',$value->tanggal)
    //             ->where('dest_sales_area',$value->sales_area)
    //             ->where('produk_name', "SP DATA 3GB EJBN")
    //             ->where('qty','>', 4)
    //             ->whereIn('dest_saldomobo_id', function($query)
    //             {
    //                 $query->select('id_outlet')
    //                     ->from('outletpjps')
    //                     ->whereRaw('outletpjps.id_outlet = sell_ins.dest_saldomobo_id');
    //             })
    //             ->get()
    //             ->count();
    
    
    //             $outlet_sp9gb =  SellIn::where('transaction_datetimes',$value->tanggal)
    //             ->where('dest_sales_area',$value->sales_area)
    //             ->where('produk_name', "SP DATA 9GB EJBN")
    //             ->where('qty','>', 1)
    //             ->whereIn('dest_saldomobo_id', function($query)
    //             {
    //                 $query->select('id_outlet')
    //                     ->from('outletpjps')
    //                     ->whereRaw('outletpjps.id_outlet = sell_ins.dest_saldomobo_id');
    //             })
    //             ->get()
    //             ->count();
    
    //             $outlet_sp9gb =  SellIn::where('transaction_datetimes',$value->tanggal)
    //             ->where('dest_sales_area',$value->sales_area)
    //             ->where('produk_name', "SP DATA 9GB EJBN")
    //             ->where('qty','>', 1)
    //             ->whereIn('dest_saldomobo_id', function($query)
    //             {
    //                 $query->select('id_outlet')
    //                     ->from('outletpjps')
    //                     ->whereRaw('outletpjps.id_outlet = sell_ins.dest_saldomobo_id');
    //             })
    //             ->get()
    //             ->count();
    
    //             $spreg_today =  SellIn::where('transaction_datetimes',$value->tanggal)
    //             ->where('dest_sales_area',$value->sales_area)
    //             ->where('produk_name', "SP IM3 90D LTE (QN)")
    //             ->where('transaction_datetimes','>=', $awalbulanini)
    //             ->sum('qty')
    //             ;
    
    
    //             $spori_today =  SellIn::where('transaction_datetimes',$value->tanggal)
    //             ->where('dest_sales_area',$value->sales_area)
    //             ->where('transaction_datetimes','>=', $awalbulanini)
    //             ->where(function($query)
    //                 {
    //                     $query->where('produk_name', "SP DAT 16GB EJBN LTE")
    //                     ->orWhere('produk_name',  "SP DAT 2GB EJBN LTE")
    //                     ->orWhere('produk_name',  "SP DAT 2GB EJBN LTE")
    //                     ->orWhere('produk_name',  "SP DAT 8GB EJBN LTE") 
    //                     ->orWhere('produk_name', "SP DATA 3GB EJBN") 
    //                     ->orWhere('produk_name', "SP DAT 9GB EJBN");
    //                 })
    //             ->sum('qty');
    
    
    //             // $spreg_last =  SellIn::where('transaction_datetimes',$value->tanggal)
    //             $spreg_last =  SellIn::where('dest_sales_area',$value->sales_area)
    //             ->where('produk_name', "SP IM3 90D LTE (QN)")
    //             ->where('transaction_datetimes','>=', $bulankemarin)
    //             ->where('transaction_datetimes','<', $awalbulanini)
    //             ->sum('qty');
    
    
    //             // $spori_last =  SellIn::where('transaction_datetimes',$value->tanggal)
    //             $spori_last =  SellIn::where('dest_sales_area',$value->sales_area)
    //             ->where('transaction_datetimes','>=', $bulankemarin)
    //             ->where('transaction_datetimes','<', $awalbulanini)
    //             ->where(function($query)
    //                 {
    //                     $query->where('produk_name', "SP DAT 16GB EJBN LTE")
    //                     ->orWhere('produk_name',  "SP DAT 2GB EJBN LTE")
    //                     ->orWhere('produk_name',  "SP DAT 2GB EJBN LTE")
    //                     ->orWhere('produk_name',  "SP DAT 8GB EJBN LTE") 
    //                     ->orWhere('produk_name', "SP DATA 3GB EJBN") 
    //                     ->orWhere('produk_name', "SP DAT 9GB EJBN");
    //                 })
    //             ->sum('qty');
                
    //             $result[]=[
    //                 'tanggal'=>$value->tanggal,
    //                 'sales_area'=>$value->sales_area,
    //                 'outlet'=>$outlet_pjp,
    //                 'outlet_sp0k'=>$outlet_sp0k,
    //                 'ach_sp0k'=>Str::limit($outlet_sp0k/$outlet_pjp*100,4),
    //                 'outlet_sp3gb'=>$outlet_sp3gb,
    //                 'ach_sp3gb'=>Str::limit($outlet_sp3gb/$outlet_pjp*100,4),
    //                 'outlet_sp9gb'=>$outlet_sp9gb,
    //                 'ach_sp9gb'=>Str::limit($outlet_sp9gb/$outlet_pjp*100,4),
    //                 'spori_today'=>$spori_today,
    //                 'spreg_today'=>$spreg_today,
    //                 'spori_last'=>$spori_last,
    //                 'spreg_last'=>$spreg_last,
    //                 'spori_growth'=>Str::limit($spori_today==0||$spori_last==0?0:$spori_today/$spori_last-1*100,4),
    //                 'spreg_growth'=>Str::limit($spreg_today==0||$spreg_last==0?0:$spreg_today/$spreg_last-1*100,4),
            
    //         ];
    //         }
    //         return view('menu.dashboard.area',['result'=>$result]);


    //     } elseif ($request->select=="area") {
    //         if($request->input ('datepicker') == null){
    //             $tanggal  = Date("Y-m-d",strtotime('now'));
    //         }
    //         else {
    
    //             $tanggal = '01-'.$request->datepicker;
    //         }
    
    //         $awalbulanini= date('Y-m-d',strtotime("first day of " . $tanggal));
    //         $akhirbulanini= date('Y-m-d',strtotime("last day of " . $tanggal));
    //         $bulankemarin= date('Y-m-d',strtotime($awalbulanini. " -1 month"));
    //         // Menampilkan jumlah outlet pjp
    //         $data= DB::table('sell_ins')
    //         ->select('transaction_datetimes as tanggal','dest_area as area')
    //         ->where('transaction_datetimes','>=', $awalbulanini)
    //         ->where('transaction_datetimes','<=', $akhirbulanini)
    //         ->whereIn('dest_saldomobo_id', function($query)
    //         {
    //             $query->select('id_outlet')
    //             ->from('outletpjps')
    //             ->whereRaw('outletpjps.id_outlet = sell_ins.dest_saldomobo_id');
    //         })
    //         ->GroupBy('dest_area','transaction_datetimes')
    //         ->get();
            
    //         // dd($data);
    
            
    //         $result= [];
    //         foreach ($data as $key => $value) {
                
    //             $outlet_pjp= SellIn::where('transaction_datetimes',$value->tanggal)->where('dest_area',$value->area)->whereIn('dest_saldomobo_id', function($query)
    //             {
    //                 $query->select('id_outlet')
    //                     ->from('outletpjps')
    //                     ->whereRaw('outletpjps.id_outlet = sell_ins.dest_saldomobo_id');
    //             })
    //             ->get()
    //             ->count();
    
    //             $outlet_sp0k =  SellIn::where('transaction_datetimes',$value->tanggal)
    //             ->where('dest_area',$value->area)
    //             ->where('produk_name', "SP IM3 90D LTE (QN)")
    //             ->where('qty','>', 4)
    //             ->whereIn('dest_saldomobo_id', function($query)
    //             {
    //                 $query->select('id_outlet')
    //                     ->from('outletpjps')
    //                     ->whereRaw('outletpjps.id_outlet = sell_ins.dest_saldomobo_id');
    //             })
    //             ->get()
    //             ->count();
    
            
    //             $outlet_sp0k =  SellIn::where('transaction_datetimes',$value->tanggal)
    //             ->where('dest_area',$value->area)
    //             ->where('produk_name', "SP IM3 90D LTE (QN)")
    //             ->where('qty','>', 4)
    //             ->whereIn('dest_saldomobo_id', function($query)
    //             {
    //                 $query->select('id_outlet')
    //                     ->from('outletpjps')
    //                     ->whereRaw('outletpjps.id_outlet = sell_ins.dest_saldomobo_id');
    //             })
    //             ->get()
    //             ->count();
    
    
    //             $outlet_sp3gb =  SellIn::where('transaction_datetimes',$value->tanggal)
    //             ->where('dest_area',$value->area)
    //             ->where('produk_name', "SP DATA 3GB EJBN")
    //             ->where('qty','>', 4)
    //             ->whereIn('dest_saldomobo_id', function($query)
    //             {
    //                 $query->select('id_outlet')
    //                     ->from('outletpjps')
    //                     ->whereRaw('outletpjps.id_outlet = sell_ins.dest_saldomobo_id');
    //             })
    //             ->get()
    //             ->count();
    
    
    //             $outlet_sp9gb =  SellIn::where('transaction_datetimes',$value->tanggal)
    //             ->where('dest_area',$value->area)
    //             ->where('produk_name', "SP DATA 9GB EJBN")
    //             ->where('qty','>', 1)
    //             ->whereIn('dest_saldomobo_id', function($query)
    //             {
    //                 $query->select('id_outlet')
    //                     ->from('outletpjps')
    //                     ->whereRaw('outletpjps.id_outlet = sell_ins.dest_saldomobo_id');
    //             })
    //             ->get()
    //             ->count();
    
    //             $outlet_sp9gb =  SellIn::where('transaction_datetimes',$value->tanggal)
    //             ->where('dest_area',$value->area)
    //             ->where('produk_name', "SP DATA 9GB EJBN")
    //             ->where('qty','>', 1)
    //             ->whereIn('dest_saldomobo_id', function($query)
    //             {
    //                 $query->select('id_outlet')
    //                     ->from('outletpjps')
    //                     ->whereRaw('outletpjps.id_outlet = sell_ins.dest_saldomobo_id');
    //             })
    //             ->get()
    //             ->count();
    
    //             $spreg_today =  SellIn::where('transaction_datetimes',$value->tanggal)
    //             ->where('dest_area',$value->area)
    //             ->where('produk_name', "SP IM3 90D LTE (QN)")
    //             ->where('transaction_datetimes','>=', $awalbulanini)
    //             ->sum('qty')
    //             ;
    
    
    //             $spori_today =  SellIn::where('transaction_datetimes',$value->tanggal)
    //             ->where('dest_area',$value->area)
    //             ->where('transaction_datetimes','>=', $awalbulanini)
    //             ->where(function($query)
    //                 {
    //                     $query->where('produk_name', "SP DAT 16GB EJBN LTE")
    //                     ->orWhere('produk_name',  "SP DAT 2GB EJBN LTE")
    //                     ->orWhere('produk_name',  "SP DAT 2GB EJBN LTE")
    //                     ->orWhere('produk_name',  "SP DAT 8GB EJBN LTE") 
    //                     ->orWhere('produk_name', "SP DATA 3GB EJBN") 
    //                     ->orWhere('produk_name', "SP DAT 9GB EJBN");
    //                 })
    //             ->sum('qty');
    
    
    //             // $spreg_last =  SellIn::where('transaction_datetimes',$value->tanggal)
    //             $spreg_last =  SellIn::where('dest_area',$value->area)
    //             ->where('produk_name', "SP IM3 90D LTE (QN)")
    //             ->where('transaction_datetimes','>=', $bulankemarin)
    //             ->where('transaction_datetimes','<', $awalbulanini)
    //             ->sum('qty');
    
    
    //             // $spori_last =  SellIn::where('transaction_datetimes',$value->tanggal)
    //             $spori_last =  SellIn::where('dest_area',$value->area)
    //             ->where('transaction_datetimes','>=', $bulankemarin)
    //             ->where('transaction_datetimes','<', $awalbulanini)
    //             ->where(function($query)
    //                 {
    //                     $query->where('produk_name', "SP DAT 16GB EJBN LTE")
    //                     ->orWhere('produk_name',  "SP DAT 2GB EJBN LTE")
    //                     ->orWhere('produk_name',  "SP DAT 2GB EJBN LTE")
    //                     ->orWhere('produk_name',  "SP DAT 8GB EJBN LTE") 
    //                     ->orWhere('produk_name', "SP DATA 3GB EJBN") 
    //                     ->orWhere('produk_name', "SP DAT 9GB EJBN");
    //                 })
    //             ->sum('qty');
                
    //             $result[]=[
    //                 'tanggal'=>$value->tanggal,
    //                 'area'=>$value->area,
    //                 'outlet'=>$outlet_pjp,
    //                 'outlet_sp0k'=>$outlet_sp0k,
    //                 'ach_sp0k'=>Str::limit($outlet_sp0k/$outlet_pjp*100,4),
    //                 'outlet_sp3gb'=>$outlet_sp3gb,
    //                 'ach_sp3gb'=>Str::limit($outlet_sp3gb/$outlet_pjp*100,4),
    //                 'outlet_sp9gb'=>$outlet_sp9gb,
    //                 'ach_sp9gb'=>Str::limit($outlet_sp9gb/$outlet_pjp*100,4),
    //                 'spori_today'=>$spori_today,
    //                 'spreg_today'=>$spreg_today,
    //                 'spori_last'=>$spori_last,
    //                 'spreg_last'=>$spreg_last,
    //                 'spori_growth'=>Str::limit($spori_today==0||$spori_last==0?0:$spori_today/$spori_last-1*100,4),
    //                 'spreg_growth'=>Str::limit($spreg_today==0||$spreg_last==0?0:$spreg_today/$spreg_last-1*100,4),
            
    //         ];
    //     }
    //         return view('menu.dashboard.area',['result'=>$result]);


    //     } elseif ($request->select=="cluster") {
    //         if($request->input ('datepicker') == null){
    //             $tanggal  = Date("Y-m-d",strtotime('now'));
    //         }
    //         else {
    
    //             $tanggal = '01-'.$request->datepicker;
    //         }
    
    //         $awalbulanini= date('Y-m-d',strtotime("first day of " . $tanggal));
    //         $akhirbulanini= date('Y-m-d',strtotime("last day of " . $tanggal));
    //         $bulankemarin= date('Y-m-d',strtotime($awalbulanini. " -1 month"));
    //         // Menampilkan jumlah outlet pjp
    //         $data= DB::table('sell_ins')
    //         ->select('transaction_datetimes as tanggal','dest_cluster as cluster')
    //         ->where('transaction_datetimes','>=', $awalbulanini)
    //         ->where('transaction_datetimes','<=', $akhirbulanini)
    //         ->whereIn('dest_saldomobo_id', function($query)
    //         {
    //             $query->select('id_outlet')
    //             ->from('outletpjps')
    //             ->whereRaw('outletpjps.id_outlet = sell_ins.dest_saldomobo_id');
    //         })
    //         ->GroupBy('dest_cluster','transaction_datetimes')
    //         ->get();
            
    //         // dd($data);
    
            
    //         $result= [];
    //         foreach ($data as $key => $value) {
                
    //             $outlet_pjp= SellIn::where('transaction_datetimes',$value->tanggal)->where('dest_cluster',$value->cluster)->whereIn('dest_saldomobo_id', function($query)
    //             {
    //                 $query->select('id_outlet')
    //                     ->from('outletpjps')
    //                     ->whereRaw('outletpjps.id_outlet = sell_ins.dest_saldomobo_id');
    //             })
    //             ->get()
    //             ->count();
    
    //             $outlet_sp0k =  SellIn::where('transaction_datetimes',$value->tanggal)
    //             ->where('dest_cluster',$value->cluster)
    //             ->where('produk_name', "SP IM3 90D LTE (QN)")
    //             ->where('qty','>', 4)
    //             ->whereIn('dest_saldomobo_id', function($query)
    //             {
    //                 $query->select('id_outlet')
    //                     ->from('outletpjps')
    //                     ->whereRaw('outletpjps.id_outlet = sell_ins.dest_saldomobo_id');
    //             })
    //             ->get()
    //             ->count();
    
            
    //             $outlet_sp0k =  SellIn::where('transaction_datetimes',$value->tanggal)
    //             ->where('dest_cluster',$value->cluster)
    //             ->where('produk_name', "SP IM3 90D LTE (QN)")
    //             ->where('qty','>', 4)
    //             ->whereIn('dest_saldomobo_id', function($query)
    //             {
    //                 $query->select('id_outlet')
    //                     ->from('outletpjps')
    //                     ->whereRaw('outletpjps.id_outlet = sell_ins.dest_saldomobo_id');
    //             })
    //             ->get()
    //             ->count();
    
    
    //             $outlet_sp3gb =  SellIn::where('transaction_datetimes',$value->tanggal)
    //             ->where('dest_cluster',$value->cluster)
    //             ->where('produk_name', "SP DATA 3GB EJBN")
    //             ->where('qty','>', 4)
    //             ->whereIn('dest_saldomobo_id', function($query)
    //             {
    //                 $query->select('id_outlet')
    //                     ->from('outletpjps')
    //                     ->whereRaw('outletpjps.id_outlet = sell_ins.dest_saldomobo_id');
    //             })
    //             ->get()
    //             ->count();
    
    
    //             $outlet_sp9gb =  SellIn::where('transaction_datetimes',$value->tanggal)
    //             ->where('dest_cluster',$value->cluster)
    //             ->where('produk_name', "SP DATA 9GB EJBN")
    //             ->where('qty','>', 1)
    //             ->whereIn('dest_saldomobo_id', function($query)
    //             {
    //                 $query->select('id_outlet')
    //                     ->from('outletpjps')
    //                     ->whereRaw('outletpjps.id_outlet = sell_ins.dest_saldomobo_id');
    //             })
    //             ->get()
    //             ->count();
    
    //             $outlet_sp9gb =  SellIn::where('transaction_datetimes',$value->tanggal)
    //             ->where('dest_cluster',$value->cluster)
    //             ->where('produk_name', "SP DATA 9GB EJBN")
    //             ->where('qty','>', 1)
    //             ->whereIn('dest_saldomobo_id', function($query)
    //             {
    //                 $query->select('id_outlet')
    //                     ->from('outletpjps')
    //                     ->whereRaw('outletpjps.id_outlet = sell_ins.dest_saldomobo_id');
    //             })
    //             ->get()
    //             ->count();
    
    //             $spreg_today =  SellIn::where('transaction_datetimes',$value->tanggal)
    //             ->where('dest_cluster',$value->cluster)
    //             ->where('produk_name', "SP IM3 90D LTE (QN)")
    //             ->where('transaction_datetimes','>=', $awalbulanini)
    //             ->sum('qty')
    //             ;
    
    
    //             $spori_today =  SellIn::where('transaction_datetimes',$value->tanggal)
    //             ->where('dest_cluster',$value->cluster)
    //             ->where('transaction_datetimes','>=', $awalbulanini)
    //             ->where(function($query)
    //                 {
    //                     $query->where('produk_name', "SP DAT 16GB EJBN LTE")
    //                     ->orWhere('produk_name',  "SP DAT 2GB EJBN LTE")
    //                     ->orWhere('produk_name',  "SP DAT 2GB EJBN LTE")
    //                     ->orWhere('produk_name',  "SP DAT 8GB EJBN LTE") 
    //                     ->orWhere('produk_name', "SP DATA 3GB EJBN") 
    //                     ->orWhere('produk_name', "SP DAT 9GB EJBN");
    //                 })
    //             ->sum('qty');
    
    
    //             // $spreg_last =  SellIn::where('transaction_datetimes',$value->tanggal)
    //             $spreg_last =  SellIn::where('dest_cluster',$value->cluster)
    //             ->where('produk_name', "SP IM3 90D LTE (QN)")
    //             ->where('transaction_datetimes','>=', $bulankemarin)
    //             ->where('transaction_datetimes','<', $awalbulanini)
    //             ->sum('qty');
    
    
    //             // $spori_last =  SellIn::where('transaction_datetimes',$value->tanggal)
    //             $spori_last =  SellIn::where('dest_cluster',$value->cluster)
    //             ->where('transaction_datetimes','>=', $bulankemarin)
    //             ->where('transaction_datetimes','<', $awalbulanini)
    //             ->where(function($query)
    //                 {
    //                     $query->where('produk_name', "SP DAT 16GB EJBN LTE")
    //                     ->orWhere('produk_name',  "SP DAT 2GB EJBN LTE")
    //                     ->orWhere('produk_name',  "SP DAT 2GB EJBN LTE")
    //                     ->orWhere('produk_name',  "SP DAT 8GB EJBN LTE") 
    //                     ->orWhere('produk_name', "SP DATA 3GB EJBN") 
    //                     ->orWhere('produk_name', "SP DAT 9GB EJBN");
    //                 })
    //             ->sum('qty');
                
    //             $result[]=[
    //                 'tanggal'=>$value->tanggal,
    //                 'cluster'=>$value->cluster,
    //                 'outlet'=>$outlet_pjp,
    //                 'outlet_sp0k'=>$outlet_sp0k,
    //                 'ach_sp0k'=>Str::limit($outlet_sp0k/$outlet_pjp*100,4),
    //                 'outlet_sp3gb'=>$outlet_sp3gb,
    //                 'ach_sp3gb'=>Str::limit($outlet_sp3gb/$outlet_pjp*100,4),
    //                 'outlet_sp9gb'=>$outlet_sp9gb,
    //                 'ach_sp9gb'=>Str::limit($outlet_sp9gb/$outlet_pjp*100,4),
    //                 'spori_today'=>$spori_today,
    //                 'spreg_today'=>$spreg_today,
    //                 'spori_last'=>$spori_last,
    //                 'spreg_last'=>$spreg_last,
    //                 'spori_growth'=>Str::limit($spori_today==0||$spori_last==0?0:$spori_today/$spori_last-1*100,4),
    //                 'spreg_growth'=>Str::limit($spreg_today==0||$spreg_last==0?0:$spreg_today/$spreg_last-1*100,4),
            
    //         ];
    //     }
    //         return view('menu.dashboard.cluster',['result'=>$result]);
    
    //     } elseif ($request->select=="region") {

    //         if($request->input ('datepicker') == null){
    //             $tanggal  = Date("Y-m-d",strtotime('now'));
    //         }
    //         else {
    
    //             $tanggal = '01-'.$request->datepicker;
    //         }
    
    //         $awalbulanini= date('Y-m-d',strtotime("first day of " . $tanggal));
    //         $akhirbulanini= date('Y-m-d',strtotime("last day of " . $tanggal));
    //         $bulankemarin= date('Y-m-d',strtotime($awalbulanini. " -1 month"));
    //         // Menampilkan jumlah outlet pjp
    //         $data= DB::table('sell_ins')
    //         ->select('transaction_datetimes as tanggal','dest_region as region')
    //         ->where('transaction_datetimes','>=', $awalbulanini)
    //         ->where('transaction_datetimes','<=', $akhirbulanini)
    //         ->whereIn('dest_saldomobo_id', function($query)
    //         {
    //             $query->select('id_outlet')
    //             ->from('outletpjps')
    //             ->whereRaw('outletpjps.id_outlet = sell_ins.dest_saldomobo_id');
    //         })
    //         ->GroupBy('dest_region','transaction_datetimes')
    //         ->get();
            
    //         // dd($data);

            
    //         $result= [];
    //         foreach ($data as $key => $value) {
                
    //             $outlet_pjp= SellIn::where('transaction_datetimes',$value->tanggal)->where('dest_region',$value->region)->whereIn('dest_saldomobo_id', function($query)
    //             {
    //                 $query->select('id_outlet')
    //                     ->from('outletpjps')
    //                     ->whereRaw('outletpjps.id_outlet = sell_ins.dest_saldomobo_id');
    //             })
    //             ->get()
    //             ->count();

    //             $outlet_sp0k =  SellIn::where('transaction_datetimes',$value->tanggal)
    //             ->where('dest_region',$value->region)
    //             ->where('produk_name', "SP IM3 90D LTE (QN)")
    //             ->where('qty','>', 4)
    //             ->whereIn('dest_saldomobo_id', function($query)
    //             {
    //                 $query->select('id_outlet')
    //                     ->from('outletpjps')
    //                     ->whereRaw('outletpjps.id_outlet = sell_ins.dest_saldomobo_id');
    //             })
    //             ->get()
    //             ->count();

            
    //             $outlet_sp0k =  SellIn::where('transaction_datetimes',$value->tanggal)
    //             ->where('dest_region',$value->region)
    //             ->where('produk_name', "SP IM3 90D LTE (QN)")
    //             ->where('qty','>', 4)
    //             ->whereIn('dest_saldomobo_id', function($query)
    //             {
    //                 $query->select('id_outlet')
    //                     ->from('outletpjps')
    //                     ->whereRaw('outletpjps.id_outlet = sell_ins.dest_saldomobo_id');
    //             })
    //             ->get()
    //             ->count();


    //             $outlet_sp3gb =  SellIn::where('transaction_datetimes',$value->tanggal)
    //             ->where('dest_region',$value->region)
    //             ->where('produk_name', "SP DATA 3GB EJBN")
    //             ->where('qty','>', 4)
    //             ->whereIn('dest_saldomobo_id', function($query)
    //             {
    //                 $query->select('id_outlet')
    //                     ->from('outletpjps')
    //                     ->whereRaw('outletpjps.id_outlet = sell_ins.dest_saldomobo_id');
    //             })
    //             ->get()
    //             ->count();


    //             $outlet_sp9gb =  SellIn::where('transaction_datetimes',$value->tanggal)
    //             ->where('dest_region',$value->region)
    //             ->where('produk_name', "SP DATA 9GB EJBN")
    //             ->where('qty','>', 1)
    //             ->whereIn('dest_saldomobo_id', function($query)
    //             {
    //                 $query->select('id_outlet')
    //                     ->from('outletpjps')
    //                     ->whereRaw('outletpjps.id_outlet = sell_ins.dest_saldomobo_id');
    //             })
    //             ->get()
    //             ->count();

    //             $outlet_sp9gb =  SellIn::where('transaction_datetimes',$value->tanggal)
    //             ->where('dest_region',$value->region)
    //             ->where('produk_name', "SP DATA 9GB EJBN")
    //             ->where('qty','>', 1)
    //             ->whereIn('dest_saldomobo_id', function($query)
    //             {
    //                 $query->select('id_outlet')
    //                     ->from('outletpjps')
    //                     ->whereRaw('outletpjps.id_outlet = sell_ins.dest_saldomobo_id');
    //             })
    //             ->get()
    //             ->count();

    //             $spreg_today =  SellIn::where('transaction_datetimes',$value->tanggal)
    //             ->where('dest_region',$value->region)
    //             ->where('produk_name', "SP IM3 90D LTE (QN)")
    //             ->where('transaction_datetimes','>=', $awalbulanini)
    //             ->sum('qty')
    //             ;


    //             $spori_today =  SellIn::where('transaction_datetimes',$value->tanggal)
    //             ->where('dest_region',$value->region)
    //             ->where('transaction_datetimes','>=', $awalbulanini)
    //             ->where(function($query)
    //                 {
    //                     $query->where('produk_name', "SP DAT 16GB EJBN LTE")
    //                     ->orWhere('produk_name',  "SP DAT 2GB EJBN LTE")
    //                     ->orWhere('produk_name',  "SP DAT 2GB EJBN LTE")
    //                     ->orWhere('produk_name',  "SP DAT 8GB EJBN LTE") 
    //                     ->orWhere('produk_name', "SP DATA 3GB EJBN") 
    //                     ->orWhere('produk_name', "SP DAT 9GB EJBN");
    //                 })
    //             ->sum('qty');


    //             // $spreg_last =  SellIn::where('transaction_datetimes',$value->tanggal)
    //             $spreg_last =  SellIn::where('dest_region',$value->region)
    //             ->where('produk_name', "SP IM3 90D LTE (QN)")
    //             ->where('transaction_datetimes','>=', $bulankemarin)
    //             ->where('transaction_datetimes','<', $awalbulanini)
    //             ->sum('qty');


    //             // $spori_last =  SellIn::where('transaction_datetimes',$value->tanggal)
    //             $spori_last =  SellIn::where('dest_region',$value->region)
    //             ->where('transaction_datetimes','>=', $bulankemarin)
    //             ->where('transaction_datetimes','<', $awalbulanini)
    //             ->where(function($query)
    //                 {
    //                     $query->where('produk_name', "SP DAT 16GB EJBN LTE")
    //                     ->orWhere('produk_name',  "SP DAT 2GB EJBN LTE")
    //                     ->orWhere('produk_name',  "SP DAT 2GB EJBN LTE")
    //                     ->orWhere('produk_name',  "SP DAT 8GB EJBN LTE") 
    //                     ->orWhere('produk_name', "SP DATA 3GB EJBN") 
    //                     ->orWhere('produk_name', "SP DAT 9GB EJBN");
    //                 })
    //             ->sum('qty');
                
    //             $result[]=[
    //                 'tanggal'=>$value->tanggal,
    //                 'region'=>$value->region,
    //                 'outlet'=>$outlet_pjp,
    //                 'outlet_sp0k'=>$outlet_sp0k,
    //                 'ach_sp0k'=>Str::limit($outlet_sp0k/$outlet_pjp*100,4),
    //                 'outlet_sp3gb'=>$outlet_sp3gb,
    //                 'ach_sp3gb'=>Str::limit($outlet_sp3gb/$outlet_pjp*100,4),
    //                 'outlet_sp9gb'=>$outlet_sp9gb,
    //                 'ach_sp9gb'=>Str::limit($outlet_sp9gb/$outlet_pjp*100,4),
    //                 'spori_today'=>$spori_today,
    //                 'spreg_today'=>$spreg_today,
    //                 'spori_last'=>$spori_last,
    //                 'spreg_last'=>$spreg_last,
    //                 'spori_growth'=>Str::limit($spori_today==0||$spori_last==0?0:$spori_today/$spori_last-1*100,4),
    //                 'spreg_growth'=>Str::limit($spreg_today==0||$spreg_last==0?0:$spreg_today/$spreg_last-1*100,4),
            
    //         ];

    //     }
    //     return view('menu.dashboard.region',['result'=>$result]);
        
    // } else  {

    //     if($request->input ('datepicker') == null){
    //         $tanggal  = Date("Y-m-d",strtotime('now'));
    //     }
    //     else {

    //         $tanggal = '01-'.$request->datepicker;
    //     }

    //     $awalbulanini= date('Y-m-d',strtotime("first day of " . $tanggal));
    //     $akhirbulanini= date('Y-m-d',strtotime("last day of " . $tanggal));
    //     $bulankemarin= date('Y-m-d',strtotime($awalbulanini. " -1 month"));
    //     // Menampilkan jumlah outlet pjp
    //     $data= DB::table('sell_ins')
    //     ->select('transaction_datetimes as tanggal','dest_cluster as cluster')
    //     ->where('transaction_datetimes','>=', $awalbulanini)
    //     ->where('transaction_datetimes','<=', $akhirbulanini)
    //     ->whereIn('dest_saldomobo_id', function($query)
    //     {
    //         $query->select('id_outlet')
    //         ->from('outletpjps')
    //         ->whereRaw('outletpjps.id_outlet = sell_ins.dest_saldomobo_id');
    //     })
    //     ->GroupBy('dest_cluster','transaction_datetimes')
    //     ->get();
        
    //     // dd($data);

        
    //     $result= [];
    //     foreach ($data as $key => $value) {
            
    //         $outlet_pjp= SellIn::where('transaction_datetimes',$value->tanggal)->where('dest_cluster',$value->cluster)->whereIn('dest_saldomobo_id', function($query)
    //         {
    //             $query->select('id_outlet')
    //                 ->from('outletpjps')
    //                 ->whereRaw('outletpjps.id_outlet = sell_ins.dest_saldomobo_id');
    //         })
    //         ->get()
    //         ->count();

    //         $outlet_sp0k =  SellIn::where('transaction_datetimes',$value->tanggal)
    //         ->where('dest_cluster',$value->cluster)
    //         ->where('produk_name', "SP IM3 90D LTE (QN)")
    //         ->where('qty','>', 4)
    //         ->whereIn('dest_saldomobo_id', function($query)
    //         {
    //             $query->select('id_outlet')
    //                 ->from('outletpjps')
    //                 ->whereRaw('outletpjps.id_outlet = sell_ins.dest_saldomobo_id');
    //         })
    //         ->get()
    //         ->count();

        
    //         $outlet_sp0k =  SellIn::where('transaction_datetimes',$value->tanggal)
    //         ->where('dest_cluster',$value->cluster)
    //         ->where('produk_name', "SP IM3 90D LTE (QN)")
    //         ->where('qty','>', 4)
    //         ->whereIn('dest_saldomobo_id', function($query)
    //         {
    //             $query->select('id_outlet')
    //                 ->from('outletpjps')
    //                 ->whereRaw('outletpjps.id_outlet = sell_ins.dest_saldomobo_id');
    //         })
    //         ->get()
    //         ->count();


    //         $outlet_sp3gb =  SellIn::where('transaction_datetimes',$value->tanggal)
    //         ->where('dest_cluster',$value->cluster)
    //         ->where('produk_name', "SP DATA 3GB EJBN")
    //         ->where('qty','>', 4)
    //         ->whereIn('dest_saldomobo_id', function($query)
    //         {
    //             $query->select('id_outlet')
    //                 ->from('outletpjps')
    //                 ->whereRaw('outletpjps.id_outlet = sell_ins.dest_saldomobo_id');
    //         })
    //         ->get()
    //         ->count();


    //         $outlet_sp9gb =  SellIn::where('transaction_datetimes',$value->tanggal)
    //         ->where('dest_cluster',$value->cluster)
    //         ->where('produk_name', "SP DATA 9GB EJBN")
    //         ->where('qty','>', 1)
    //         ->whereIn('dest_saldomobo_id', function($query)
    //         {
    //             $query->select('id_outlet')
    //                 ->from('outletpjps')
    //                 ->whereRaw('outletpjps.id_outlet = sell_ins.dest_saldomobo_id');
    //         })
    //         ->get()
    //         ->count();

    //         $outlet_sp9gb =  SellIn::where('transaction_datetimes',$value->tanggal)
    //         ->where('dest_cluster',$value->cluster)
    //         ->where('produk_name', "SP DATA 9GB EJBN")
    //         ->where('qty','>', 1)
    //         ->whereIn('dest_saldomobo_id', function($query)
    //         {
    //             $query->select('id_outlet')
    //                 ->from('outletpjps')
    //                 ->whereRaw('outletpjps.id_outlet = sell_ins.dest_saldomobo_id');
    //         })
    //         ->get()
    //         ->count();

    //         $spreg_today =  SellIn::where('transaction_datetimes',$value->tanggal)
    //         ->where('dest_cluster',$value->cluster)
    //         ->where('produk_name', "SP IM3 90D LTE (QN)")
    //         ->where('transaction_datetimes','>=', $awalbulanini)
    //         ->sum('qty')
    //         ;


    //         $spori_today =  SellIn::where('transaction_datetimes',$value->tanggal)
    //         ->where('dest_cluster',$value->cluster)
    //         ->where('transaction_datetimes','>=', $awalbulanini)
    //         ->where(function($query)
    //             {
    //                 $query->where('produk_name', "SP DAT 16GB EJBN LTE")
    //                 ->orWhere('produk_name',  "SP DAT 2GB EJBN LTE")
    //                 ->orWhere('produk_name',  "SP DAT 2GB EJBN LTE")
    //                 ->orWhere('produk_name',  "SP DAT 8GB EJBN LTE") 
    //                 ->orWhere('produk_name', "SP DATA 3GB EJBN") 
    //                 ->orWhere('produk_name', "SP DAT 9GB EJBN");
    //             })
    //         ->sum('qty');


    //         // $spreg_last =  SellIn::where('transaction_datetimes',$value->tanggal)
    //         $spreg_last =  SellIn::where('dest_cluster',$value->cluster)
    //         ->where('produk_name', "SP IM3 90D LTE (QN)")
    //         ->where('transaction_datetimes','>=', $bulankemarin)
    //         ->where('transaction_datetimes','<', $awalbulanini)
    //         ->sum('qty');


    //         // $spori_last =  SellIn::where('transaction_datetimes',$value->tanggal)
    //         $spori_last =  SellIn::where('dest_cluster',$value->cluster)
    //         ->where('transaction_datetimes','>=', $bulankemarin)
    //         ->where('transaction_datetimes','<', $awalbulanini)
    //         ->where(function($query)
    //             {
    //                 $query->where('produk_name', "SP DAT 16GB EJBN LTE")
    //                 ->orWhere('produk_name',  "SP DAT 2GB EJBN LTE")
    //                 ->orWhere('produk_name',  "SP DAT 2GB EJBN LTE")
    //                 ->orWhere('produk_name',  "SP DAT 8GB EJBN LTE") 
    //                 ->orWhere('produk_name', "SP DATA 3GB EJBN") 
    //                 ->orWhere('produk_name', "SP DAT 9GB EJBN");
    //             })
    //         ->sum('qty');


            
    //         $outlet_fi3gb =  SellIn::where('transaction_datetimes',$value->tanggal)
    //         ->where('dest_cluster',$value->cluster)
    //         ->where('produk_name', "VOU FI3GB/30hr Balnus")
    //         ->where('qty','>', 9)
    //         ->whereIn('dest_saldomobo_id', function($query)
    //         {
    //             $query->select('id_outlet')
    //                 ->from('outletpjps')
    //                 ->whereRaw('outletpjps.id_outlet = sell_ins.dest_saldomobo_id');
    //         })
    //         ->get()
    //         ->count();


    //         $outlet_fi25gb =  SellIn::where('transaction_datetimes',$value->tanggal)
    //         ->where('dest_cluster',$value->cluster)
    //         ->where('produk_name', "VOUCORI FI2.5GB/5D EJBN")
    //         ->where('qty','>', 4)
    //         ->whereIn('dest_saldomobo_id', function($query)
    //         {
    //             $query->select('id_outlet')
    //                 ->from('outletpjps')
    //                 ->whereRaw('outletpjps.id_outlet = sell_ins.dest_saldomobo_id');
    //         })
    //         ->get()
    //         ->count();


    //         $voucer_today =  SellIn::where('transaction_datetimes',$value->tanggal)
    //         ->where('dest_cluster',$value->cluster)
    //         ->where('transaction_datetimes','>=', $awalbulanini)
    //         ->where(function($query)
    //             {
    //                 $query->where('produk_name', "VOU FU 20GB/30hr Jatim Madura")
    //                 ->orWhere('produk_name',  "VORI FI 2GB/3GB 30D JATIM")
    //                 ->orWhere('produk_name',  "VOUCORI FI2.5GB/5D EJBN")
    //                 ->orWhere('produk_name',  "VORI FU 3GB JATIM") 
    //                 ->orWhere('produk_name', "VOU FI3GB/30hr Jatim Madura") 
    //                 ->orWhere('produk_name', "VOU FI Sachet 2.5GB EJBN")
    //                 ->orWhere('produk_name', "VOU FI3GB/30hr Balnus")
    //                 ->orWhere('produk_name', "VORI FI 2GB/3GB 30D BALINUSRA")
    //                 ->orWhere('produk_name', "FI Sachet 2.5GB EJBN")
    //                 ->orWhere('produk_name', "FI3GB/30hr Jatim,Madura")
    //                 ->orWhere('produk_name', "FU 20GB/30hr Jatim,Madura")
    //                 ->orWhere('produk_name', "FI3GB/30hr Balnus")
    //                 ->orWhere('produk_name', "FI3GB/30hr Jatim_New");
    //             })
    //         ->sum('qty');


    //         $voucer_last =  SellIn::where('dest_cluster',$value->cluster)
    //         ->where('transaction_datetimes','>=', $bulankemarin)
    //         ->where('transaction_datetimes','<', $awalbulanini)
    //         ->where(function($query)
    //             {
    //                 $query->where('produk_name', "VOU FU 20GB/30hr Jatim Madura")
    //                 ->orWhere('produk_name',  "VORI FI 2GB/3GB 30D JATIM")
    //                 ->orWhere('produk_name',  "VOUCORI FI2.5GB/5D EJBN")
    //                 ->orWhere('produk_name',  "VORI FU 3GB JATIM") 
    //                 ->orWhere('produk_name', "VOU FI3GB/30hr Jatim Madura") 
    //                 ->orWhere('produk_name', "VOU FI Sachet 2.5GB EJBN")
    //                 ->orWhere('produk_name', "VOU FI3GB/30hr Balnus")
    //                 ->orWhere('produk_name', "VORI FI 2GB/3GB 30D BALINUSRA")
    //                 ->orWhere('produk_name', "FI Sachet 2.5GB EJBN")
    //                 ->orWhere('produk_name', "FI3GB/30hr Jatim,Madura")
    //                 ->orWhere('produk_name', "FU 20GB/30hr Jatim,Madura")
    //                 ->orWhere('produk_name', "FI3GB/30hr Balnus")
    //                 ->orWhere('produk_name', "FI3GB/30hr Jatim_New");
    //             })
    //         ->sum('qty');


            
    //         $result[]=[
    //             'tanggal'=>$value->tanggal,
    //             'cluster'=>$value->cluster,
    //             'outlet'=>$outlet_pjp,
    //             'ach_sp0k'=>Str::limit($outlet_sp0k/$outlet_pjp*100,4),
    //             'ach_sp3gb'=>Str::limit($outlet_sp3gb/$outlet_pjp*100,4),
    //             'ach_sp9gb'=>Str::limit($outlet_sp9gb/$outlet_pjp*100,4),
    //             'spori_growth'=>Str::limit($spori_today==0||$spori_last==0?0:$spori_today/$spori_last-1*100,4),
    //             'spreg_growth'=>Str::limit($spreg_today==0||$spreg_last==0?0:$spreg_today/$spreg_last-1*100,4),
    //             'ach_fi3gb'=>Str::limit($outlet_fi3gb/$outlet_pjp*100,4),
    //             'ach_fi25gb'=>Str::limit($outlet_fi25gb/$outlet_pjp*100,4),
    //             'vou_growth'=>Str::limit($voucer_today==0||$voucer_last==0?0:$voucer_today/$voucer_last-1*100,4),
        
    //     ];

    // }
    // return view('menu.dashboard.summary',['result'=>$result]);
    // }

    
//            
//  $data = SellIn::select(
//                 "transaction_datetimes", 
//                 "dest_region",
//                 DB::raw("count(dest_saldomobo_id) as total_outlet"->whereIn('dest_saldomobo_id', function($query)
//                 {
//                     $query->select('id_outlet')
//                         ->from('outletpjps')
//                         ->whereRaw('outletpjps.id_outlet = sell_ins.dest_saldomobo_id');
//                 })
//                 ),
//                 DB::raw("count(dest_saldomobo_id) as outlet_sp0k"),
//             )
            
//         ->groupBy("dest_region","transaction_datetimes")
//         ->get();

// dd($data->toArray());


                          // dd($data_all);
                      // dd($data,$data_sp0k,$data_sp3gb,$data_sp9gb,$data_spreg);
    }

    // public function datadash($filter)
    // {
    //     // Menampilkan jumlah outlet pjp
    //     $data= DB::table('sell_ins')
    //     ->select('transaction_datetimes',$filter,DB::raw('COUNT(dest_saldomobo_id) as outlet'))
    //     ->whereIn('dest_saldomobo_id', function($query)
    //     {
    //         $query->select('id_outlet')
    //             ->from('outletpjps')
    //             ->whereRaw('outletpjps.id_outlet = sell_ins.dest_saldomobo_id');
    //     })
    //     ->GroupBy($filter,'transaction_datetimes')
    //     ->get();

    //     return $data;
    // }
    
    // public function datasp0k($filter)
    // {
    //     // Menampilkan data outlet sp 0k min 5 pcs
    //     $data_sp0k= DB::table('sell_ins')
    //     ->select('transaction_datetimes',$filter,DB::raw('COUNT(dest_saldomobo_id) as outlet'))
    //     ->where('produk_name', "SP IM3 90D LTE (QN)")
    //     ->where('qty','>', 4)
    //     ->whereIn('dest_saldomobo_id', function($query)
    //     {
    //         $query->select('id_outlet')
    //             ->from('outletpjps')
    //             ->whereRaw('outletpjps.id_outlet = sell_ins.dest_saldomobo_id');
    //     })
    //     ->GroupBy($filter,'transaction_datetimes')
    //     ->get();

    //     return $data_sp0k;
    // }


    // public function datasp3gb($filter)
    // {
        
    //     // Menampilkan data outlet sp 3gb min 5 pcs
    //     $data_sp3gb= DB::table('sell_ins')
    //     ->select('transaction_datetimes',$filter,DB::raw('COUNT(dest_saldomobo_id) as outlet'))
    //     ->where('produk_name', "SP DATA 3GB EJBN")
    //     ->where('qty','>', 4)
    //     ->whereIn('dest_saldomobo_id', function($query)
    //     {
    //         $query->select('id_outlet')
    //             ->from('outletpjps')
    //             ->whereRaw('outletpjps.id_outlet = sell_ins.dest_saldomobo_id');
    //     })
    //     ->GroupBy($filter,'transaction_datetimes')
    //     ->get();

    //     return $data_sp3gb;
    // }


    // public function datasp9gb($filter)
    // {
        
    //     // Menampilkan data outlet sp 9gb min 2 pcs
    //     $data_sp9gb= DB::table('sell_ins')
    //     ->select('transaction_datetimes',$filter,DB::raw('COUNT(dest_saldomobo_id) as outlet'))
    //     ->where('produk_name', "SP DATA 9GB EJBN")
    //     ->where('qty','>', 1)
    //     ->whereIn('dest_saldomobo_id', function($query)
    //     {
    //         $query->select('id_outlet')
    //             ->from('outletpjps')
    //             ->whereRaw('outletpjps.id_outlet = sell_ins.dest_saldomobo_id');
    //     })
    //     ->GroupBy($filter,'transaction_datetimes')
    //     ->get();

    //     return $data_sp9gb;
    // }

    // public function dataspreg($filter)
    // {
        
    //     // Menampilkan data total sp reg bulan juli
    //     $data_spreg= DB::table('sell_ins')
    //     ->select($filter,DB::raw('COUNT(qty) as total'))
    //     ->where('produk_name', "SP IM3 90D LTE (QN)")
    //     ->whereMonth('transaction_datetimes', '08')
    //     ->GroupBy($filter)
    //     ->get();

    //     return $data_spreg;
    // }


    // public function dataspori($filter)
    // {
    //     // Menampilkan data total sp ori bulan juli
    //     $data_spori= DB::table('sell_ins')
    //     ->select($filter,DB::raw('SUM(qty) as total'))
    //     // ->whereMonth('transaction_datetimes', '<=', $date)
    //     ->whereMonth('transaction_datetimes', '08')
    //     ->where('produk_name', "SP DAT 16GB EJBN LTE") 
    //     ->orWhere('produk_name',  "SP DAT 2GB EJBN LTE") 
    //     ->orWhere('produk_name',  "SP DAT 8GB EJBN LTE") 
    //     ->orWhere('produk_name', "SP DATA 3GB EJBN") 
    //     ->orWhere('produk_name', "SP DAT 9GB EJBN") 
    //     ->GroupBy($filter)
    //     ->get();

    //     return $data_spori;

    public function detail_summary(Request $request,$id)
    {
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
            ->select('transaction_datetimes as tanggal','dest_cluster as cluster','dest_micro_cluster as micro_cluster')
            ->where('dest_cluster',$id)
            ->where('transaction_datetimes','>=', $awalbulanini)
            ->where('transaction_datetimes','<=', $akhirbulanini)
            ->whereIn('dest_saldomobo_id', function($query)
            {
                $query->select('id_outlet')
                ->from('outletpjps')
                ->whereRaw('outletpjps.id_outlet = sell_ins.dest_saldomobo_id');
            })
            ->GroupBy('dest_cluster','dest_micro_cluster','transaction_datetimes')
            ->get();
            
            // dd($data);
    
            
            $result= [];
            foreach ($data as $key => $value) {
                
                $outlet_pjp= SellIn::where('transaction_datetimes',$value->tanggal)->where('dest_cluster',$value->cluster)->where('dest_micro_cluster',$value->micro_cluster)->whereIn('dest_saldomobo_id', function($query)
                {
                    $query->select('id_outlet')
                        ->from('outletpjps')
                        ->whereRaw('outletpjps.id_outlet = sell_ins.dest_saldomobo_id');
                })
                ->get()
                ->count();
    
                $outlet_sp0k =  SellIn::where('transaction_datetimes',$value->tanggal)
                ->where('dest_micro_cluster',$value->micro_cluster)
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
                ->where('dest_micro_cluster',$value->micro_cluster)
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
                ->where('dest_micro_cluster',$value->micro_cluster)
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
                ->where('dest_micro_cluster',$value->micro_cluster)
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
                ->where('dest_micro_cluster',$value->micro_cluster)
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
                ->where('dest_micro_cluster',$value->micro_cluster)
                ->where('produk_name', "SP IM3 90D LTE (QN)")
                ->where('transaction_datetimes','>=', $awalbulanini)
                ->sum('qty')
                ;
    
    
                $spori_today =  SellIn::where('transaction_datetimes',$value->tanggal)
                ->where('dest_cluster',$value->cluster)
                ->where('dest_micro_cluster',$value->micro_cluster)
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
                $spreg_last =  SellIn::where('dest_micro_cluster',$value->micro_cluster)
                ->where('dest_cluster',$value->cluster)
                ->where('produk_name', "SP IM3 90D LTE (QN)")
                ->where('transaction_datetimes','>=', $bulankemarin)
                ->where('transaction_datetimes','<', $awalbulanini)
                ->sum('qty');
    
    
                // $spori_last =  SellIn::where('transaction_datetimes',$value->tanggal)
                $spori_last =  SellIn::where('dest_micro_cluster',$value->micro_cluster)
                ->where('dest_cluster',$value->cluster)
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
                

            $outlet_fi3gb =  SellIn::where('transaction_datetimes',$value->tanggal)
            ->where('dest_micro_cluster',$value->micro_cluster)
            ->where('dest_cluster',$value->cluster)
            ->where('produk_name', "VOU FI3GB/30hr Balnus")
            ->where('qty','>', 9)
            ->whereIn('dest_saldomobo_id', function($query)
            {
                $query->select('id_outlet')
                    ->from('outletpjps')
                    ->whereRaw('outletpjps.id_outlet = sell_ins.dest_saldomobo_id');
            })
            ->get()
            ->count();


            $outlet_fi25gb =  SellIn::where('transaction_datetimes',$value->tanggal)
            ->where('dest_micro_cluster',$value->micro_cluster)
            ->where('dest_cluster',$value->cluster)
            ->where('produk_name', "VOUCORI FI2.5GB/5D EJBN")
            ->where('qty','>', 4)
            ->whereIn('dest_saldomobo_id', function($query)
            {
                $query->select('id_outlet')
                    ->from('outletpjps')
                    ->whereRaw('outletpjps.id_outlet = sell_ins.dest_saldomobo_id');
            })
            ->get()
            ->count();


            $voucer_today =  SellIn::where('transaction_datetimes',$value->tanggal)
            ->where('dest_micro_cluster',$value->micro_cluster)
            ->where('dest_cluster',$value->cluster)
            ->where('transaction_datetimes','>=', $awalbulanini)
            ->where(function($query)
                {
                    $query->where('produk_name', "VOU FU 20GB/30hr Jatim Madura")
                    ->orWhere('produk_name',  "VORI FI 2GB/3GB 30D JATIM")
                    ->orWhere('produk_name',  "VOUCORI FI2.5GB/5D EJBN")
                    ->orWhere('produk_name',  "VORI FU 3GB JATIM") 
                    ->orWhere('produk_name', "VOU FI3GB/30hr Jatim Madura") 
                    ->orWhere('produk_name', "VOU FI Sachet 2.5GB EJBN")
                    ->orWhere('produk_name', "VOU FI3GB/30hr Balnus")
                    ->orWhere('produk_name', "VORI FI 2GB/3GB 30D BALINUSRA")
                    ->orWhere('produk_name', "FI Sachet 2.5GB EJBN")
                    ->orWhere('produk_name', "FI3GB/30hr Jatim,Madura")
                    ->orWhere('produk_name', "FU 20GB/30hr Jatim,Madura")
                    ->orWhere('produk_name', "FI3GB/30hr Balnus")
                    ->orWhere('produk_name', "FI3GB/30hr Jatim_New");
                })
            ->sum('qty');


            $voucer_last =  SellIn::where('dest_cluster',$value->cluster)
            ->where('dest_micro_cluster',$value->micro_cluster)
            ->where('transaction_datetimes','>=', $bulankemarin)
            ->where('transaction_datetimes','<', $awalbulanini)
            ->where(function($query)
                {
                    $query->where('produk_name', "VOU FU 20GB/30hr Jatim Madura")
                    ->orWhere('produk_name',  "VORI FI 2GB/3GB 30D JATIM")
                    ->orWhere('produk_name',  "VOUCORI FI2.5GB/5D EJBN")
                    ->orWhere('produk_name',  "VORI FU 3GB JATIM") 
                    ->orWhere('produk_name', "VOU FI3GB/30hr Jatim Madura") 
                    ->orWhere('produk_name', "VOU FI Sachet 2.5GB EJBN")
                    ->orWhere('produk_name', "VOU FI3GB/30hr Balnus")
                    ->orWhere('produk_name', "VORI FI 2GB/3GB 30D BALINUSRA")
                    ->orWhere('produk_name', "FI Sachet 2.5GB EJBN")
                    ->orWhere('produk_name', "FI3GB/30hr Jatim,Madura")
                    ->orWhere('produk_name', "FU 20GB/30hr Jatim,Madura")
                    ->orWhere('produk_name', "FI3GB/30hr Balnus")
                    ->orWhere('produk_name', "FI3GB/30hr Jatim_New");
                })
            ->sum('qty');


                $result[]=[
                    'tanggal'=>$value->tanggal,
                    'micro_cluster'=>$value->micro_cluster,
                    'outlet'=>$outlet_pjp,
                    'outlet_sp0k'=>$outlet_sp0k,
                    'ach_sp0k'=>Str::limit($outlet_sp0k/$outlet_pjp*100,4),
                    'outlet_sp3gb'=>$outlet_sp3gb,
                    'ach_sp3gb'=>Str::limit($outlet_sp3gb/$outlet_pjp*100,4),
                    'outlet_sp9gb'=>$outlet_sp9gb,
                    'ach_sp9gb'=>Str::limit($outlet_sp9gb/$outlet_pjp*100,4),
                    'spori_today'=>$spori_today,
                    'spreg_today'=>$spreg_today,
                    'spori_last'=>$spori_last,
                    'spreg_last'=>$spreg_last,
                    'spori_growth'=>Str::limit($spori_today==0||$spori_last==0?0:$spori_today/$spori_last-1*100,4),
                    'spreg_growth'=>Str::limit($spreg_today==0||$spreg_last==0?0:$spreg_today/$spreg_last-1*100,4),
                    '$outlet_fi3gb'=>$outlet_fi3gb==0?0:$outlet_fi3gb,
                    'ach_fi3gb'=>Str::limit($outlet_fi3gb/$outlet_pjp*100,4),
                    '$outlet_fi25gb'=>$outlet_fi25gb==0?0:$outlet_fi25gb,
                    'ach_fi25gb'=>Str::limit($outlet_fi25gb/$outlet_pjp*100,4),
                    'vou_growth'=>Str::limit($voucer_today==0||$voucer_last==0?0:$voucer_today/$voucer_last-1*100,4),
            
            ];
            // dd($result);
        }
            return view('menu.dashboard.detail_summary', ['result'=>$result]);
            // return view('menu.detail_sell');
    }
    }
        
    

    // public function filter(Request $request)
    // {
    //     if($request->select=="area"){
    //         $data= DB::table('sell_ins')
    //     ->select('transaction_datetimes','dest_area',DB::raw('COUNT(dest_saldomobo_id) as outlet'))
    //     ->whereIn('dest_saldomobo_id', function($query)
    //     {
    //         $query->select('id_outlet')
    //             ->from('outletpjps')
    //             ->whereRaw('outletpjps.id_outlet = sell_ins.dest_saldomobo_id');
    //     })
    //     ->GroupBy('dest_area','transaction_datetimes')
    //     ->get();

    //             // Menampilkan jumlah outlet pjp
    //             // $data= DB::table('sell_ins')
    //             // ->select('transaction_datetimes as tanggal','dest_cluster as cluster',DB::raw('COUNT(dest_saldomobo_id) as outlet'))
    //             // ->whereIn('dest_saldomobo_id', function($query)
    //             // {
    //             //     $query->select('id_outlet')
    //             //         ->from('outletpjps')
    //             //         ->whereRaw('outletpjps.id_outlet = sell_ins.dest_saldomobo_id');
    //             // })
    //             // ->GroupBy('dest_cluster','transaction_datetimes')
    //             // ->get();
        
                
    //             // // Menampilkan data outlet sp 0k min 5 pcs
    //             // $data_sp0k= DB::table('sell_ins')
    //             // ->select('transaction_datetimes','dest_cluster',DB::raw('COUNT(dest_saldomobo_id) as sp0k'))
    //             // ->where('produk_name', "SP IM3 90D LTE (QN)")
    //             // ->where('qty','>', 4)
    //             // ->whereIn('dest_saldomobo_id', function($query)
    //             // {
    //             //     $query->select('id_outlet')
    //             //         ->from('outletpjps')
    //             //         ->whereRaw('outletpjps.id_outlet = sell_ins.dest_saldomobo_id');
    //             // })
    //             // ->GroupBy('dest_cluster','transaction_datetimes')
    //             // ->get();
        
    //             // // Menampilkan data outlet sp 3gb min 5 pcs
    //             // $data_sp3gb= DB::table('sell_ins')
    //             // ->select('transaction_datetimes','dest_cluster',DB::raw('COUNT(dest_saldomobo_id) as sp3gb'))
    //             // ->where('produk_name', "SP DATA 3GB EJBN")
    //             // ->where('qty','>', 4)
    //             // ->whereIn('dest_saldomobo_id', function($query)
    //             // {
    //             //     $query->select('id_outlet')
    //             //         ->from('outletpjps')
    //             //         ->whereRaw('outletpjps.id_outlet = sell_ins.dest_saldomobo_id');
    //             // })
    //             // ->GroupBy('dest_cluster','transaction_datetimes')
    //             // ->get();
        
    //             // // Menampilkan data outlet sp 9gb min 2 pcs
    //             // $data_sp9gb= DB::table('sell_ins')
    //             // ->select('transaction_datetimes','dest_cluster',DB::raw('COUNT(dest_saldomobo_id) as sp9gb'))
    //             // ->where('produk_name', "SP DATA 9GB EJBN")
    //             // ->where('qty','>', 1)
    //             // ->whereIn('dest_saldomobo_id', function($query)
    //             // {
    //             //     $query->select('id_outlet')
    //             //         ->from('outletpjps')
    //             //         ->whereRaw('outletpjps.id_outlet = sell_ins.dest_saldomobo_id');
    //             // })
    //             // ->GroupBy('dest_cluster','transaction_datetimes')
    //             // ->get();
        
    //             // // Menampilkan data total sp reg bulan juli
    //             // $data_spreg= DB::table('sell_ins')
    //             // ->select('transaction_datetimes','dest_cluster',DB::raw('COUNT(qty) as spreg'))
    //             // ->where('produk_name', "SP IM3 90D LTE (QN)")
    //             // ->GroupBy('dest_cluster','transaction_datetimes')
    //             // ->get();
        
        
    //             // // Menampilkan data total sp ori bulan juli
    //             // $data_spori= DB::table('sell_ins')
    //             // ->select('transaction_datetimes','dest_cluster',DB::raw('SUM(qty) as spori'))
    //             // ->whereMonth('transaction_datetimes', '08')
    //             // ->where('produk_name', "SP DAT 16GB EJBN LTE") 
    //             // ->orWhere('produk_name',  "SP DAT 2GB EJBN LTE") 
    //             // ->orWhere('produk_name',  "SP DAT 8GB EJBN LTE") 
    //             // ->orWhere('produk_name', "SP DATA 3GB EJBN") 
    //             // ->orWhere('produk_name', "SP DAT 9GB EJBN") 
    //             // ->GroupBy('dest_cluster','transaction_datetimes')
    //             // ->get();

    //     }elseif ($request->select=="sales_area") {
    //     $data= DB::table('sell_ins')
    //     ->select('transaction_datetimes','dest_sales_area',DB::raw('COUNT(dest_saldomobo_id) as outlet'))
    //     ->whereIn('dest_saldomobo_id', function($query)
    //     {
    //         $query->select('id_outlet')
    //             ->from('outletpjps')
    //             ->whereRaw('outletpjps.id_outlet = sell_ins.dest_saldomobo_id');
    //     })
    //     ->GroupBy('dest_sales_area','transaction_datetimes')
    //     ->get();

    //     }elseif ($request->select=="cluster") {
    //         $data= DB::table('sell_ins')
    //         ->select('transaction_datetimes','dest_cluster',DB::raw('COUNT(dest_saldomobo_id) as outlet'))
    //         ->whereIn('dest_saldomobo_id', function($query)
    //         {
    //             $query->select('id_outlet')
    //                 ->from('outletpjps')
    //                 ->whereRaw('outletpjps.id_outlet = sell_ins.dest_saldomobo_id');
    //         })
    //         ->GroupBy('dest_cluster','transaction_datetimes')
    //         ->get();

    //     }elseif ($request->select=="micro_cluster") {
    //         $data= DB::table('sell_ins')
    //         ->select('transaction_datetimes','dest_micro_cluster',DB::raw('COUNT(dest_saldomobo_id) as outlet'))
    //         ->whereIn('dest_saldomobo_id', function($query)
    //         {
    //             $query->select('id_outlet')
    //                 ->from('outletpjps')
    //                 ->whereRaw('outletpjps.id_outlet = sell_ins.dest_saldomobo_id');
    //         })
    //         ->GroupBy('dest_micro_cluster','transaction_datetimes')
    //         ->get();

    //     } else{
    //         $data= DB::table('sell_ins')
    //     ->select('transaction_datetimes','dest_region',DB::raw('COUNT(dest_saldomobo_id) as outlet'))
    //     ->whereIn('dest_saldomobo_id', function($query)
    //     {
    //         $query->select('id_outlet')
    //             ->from('outletpjps')
    //             ->whereRaw('outletpjps.id_outlet = sell_ins.dest_saldomobo_id');
    //     })
    //     ->GroupBy('dest_region','transaction_datetimes')
    //     ->get();
    //     }
     
    // }


    
