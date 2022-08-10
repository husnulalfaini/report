<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SellIn;
use App\Models\Outletpjp;
use DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\SellinImport;
use App\Exports\SellInExport;
use Auth;
use Carbon\Carbon;
use Validator;

class SellInController extends Controller
{
    public function sell_in(Request $request)
    {

        if($request->tanggal == 0)
        $tahun  = Date('Y');
        else
        $tahun = $request->tanggal;


        $data = SellIn::select ('transaction_datetimes','dest_saldomobo_id', 'dest_micro_cluster','dest_cluster', 'produk_name',DB::raw('SUM(qty) as qty'))
        ->whereDate('transaction_datetimes',$tahun)
        ->GroupBy ('transaction_datetimes','dest_saldomobo_id', 'dest_micro_cluster', 'dest_cluster', 'produk_name')
        ->get();

        // $tanggal = Sellin::select(DB::raw('Month(sell_ins.transaction_datetimes) as tanggal'))
        // ->groupBy('tanggal')
        // ->orderBy('tanggal','desc')
        // ->get();

        $tanggal = SellIn::select ('transaction_datetimes as tanggal')
        ->paginate(10);
       
        return view('menu.sell_in',compact('data','tanggal','tahun'));
        // return view('menu.sell_in');
    }



    

    // public function getsell_in(Request $request)
    // {
    //     $draw = $request->get('draw');
    //     $start = $request->get("start");
    //     $rowperpage = $request->get("length"); // total number of rows per page

    //     $columnIndex_arr = $request->get('order');
    //     $columnName_arr = $request->get('columns');
    //     $order_arr = $request->get('order');
    //     $search_arr = $request->get('search');

    //     $columnIndex = $columnIndex_arr[0]['column']; // Column index
    //     $columnName = $columnName_arr[$columnIndex]['data']; // Column name
    //     $columnSortOrder = $order_arr[0]['dir']; // asc or desc
    //     $searchValue = $search_arr['value']; // Search value

    //     // Total records
    //     $totalRecords = SellIn::select('count(*) as allcount')->count();
    //     $totalRecordswithFilter = SellIn::select('count(*) as allcount')->where('transaction_datetimes', 'like', '%' . $searchValue . '%')->count();

    //     // Get records, also we have included search filter as well
    //     $records = SellIn::orderBy($columnName, $columnSortOrder)
    //         ->where('sell_ins.transaction_datetimes', 'like', '%' . $searchValue . '%')
    //         ->orWhere('sell_ins.dest_saldomobo_id', 'like', '%' . $searchValue . '%')
    //         ->orWhere('sell_ins.dest_micro_cluster', 'like', '%' . $searchValue . '%')
    //         ->orWhere('sell_ins.dest_cluster', 'like', '%' . $searchValue . '%')
    //         ->orWhere('sell_ins.produk_name', 'like', '%' . $searchValue . '%')
    //         ->select('sell_ins.*')
    //         ->skip($start)
    //         ->take($rowperpage)
    //         ->get();
        
    //     $data_arr = array();

    //     foreach ($records as $record) {

    //         $data_arr[] = array(
    //             "transaction_datetimes" => $record->transaction_datetimes,
    //             "dest_saldomobo_id" => $record->dest_saldomobo_id,
    //             "dest_micro_cluster" => $record->dest_micro_cluster,
    //             "dest_cluster" => $record->dest_cluster,
    //             "produk_name" => $record->produk_name,
    //         );
    //     }

    //     $response = array(
    //         "draw" => intval($draw),
    //         "iTotalRecords" => $totalRecords,
    //         "iTotalDisplayRecords" => $totalRecordswithFilter,
    //         "aaData" => $data_arr,
    //     );

    //     echo json_encode($response);


    // }


    public function detail($id)
    {
            $data_sellin = SellIn::where('dest_saldomobo_id',$id)->get();
            return view('menu.detail_sell', compact('data_sellin'));
            // return view('menu.detail_sell');
    }



    public function detail_item($id)
    {
            $data_sellin = SellIn::find($id);
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
        return redirect()->route('upload')->with('success', 'Data Baru Berhasil Ditambahkan!');
            // return redirect('menu.upload');
    }


    public function download(Type $var = null)
    {
        return Excel::download(new SellInExport, 'Sellin.xlsx');
	
    }
    

    
}
