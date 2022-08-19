<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SellIn;
use App\Models\Outletpjp;
use DB;
use Maatwebsite\Excel\Facades\Excel;
use EllGreen\LaravelLoadFile\Laravel\Facades\LoadFile;
use App\Imports\SellinImport;
use App\Exports\SellInExport;
use App\Exports\SellInExportMonth;
use App\Exports\SellInExportDaily;
use Auth;
use Carbon\Carbon;
use Validator;

class SellInController extends Controller
{
    public function sell_in(Request $request)
    {

        // if($request->tanggal == 0)
        // $tahun  = Date('Y');
        // else
        // $tahun = $request->tanggal;


        // $data = SellIn::select ('transaction_datetimes','dest_saldomobo_id', 'dest_micro_cluster','dest_cluster', 'produk_name',DB::raw('SUM(qty) as qty'))
        // ->whereDate('transaction_datetimes',$tahun)
        // ->GroupBy ('transaction_datetimes','dest_saldomobo_id', 'dest_micro_cluster', 'dest_cluster', 'produk_name')
        // ->get();

        // // $tanggal = Sellin::select(DB::raw('Month(sell_ins.transaction_datetimes) as tanggal'))
        // // ->groupBy('tanggal')
        // // ->orderBy('tanggal','desc')
        // // ->get();

        // $tanggal = SellIn::select ('transaction_datetimes as tanggal')
        // ->paginate(10);
       
        // return view('menu.sell_in',compact('data','tanggal','tahun'));
        return view('menu.sell_in2');
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


    public function uploadFilequeue(Request $request)
    {
        if($request->has('csv'))
        {
            $csv = file($request->csv);

            //chunking file
            $chunks = array_chunk($csv,1000);
            $path = resource_path('temp');

            //convert chunk to new csv file
            foreach ($chunks as $key => $chunk) {
                $name = "/tmp{$key}.csv";
                file_put_contents($path.$name,$chunk);
            }

            //getting all the file inside the directories
            $files = glob("$path/*.csv");

            $header = [];
            
            foreach ($files as $key => $file) {

                $data = array_map('str_getcsv', file($file));

                if($key == 0){
                    $header = $data[0];
                    unset($data[0]);
                }
                
                foreach ($data as $sale) {
                    $sellData = array_combine($header,$sale);
                    SellIn::create($sellData);
                }

                unlink($file);
            }

            return "stored";

        }
        return "please upload csv file";

    }

    public function load(Type $var = null)
    {
    LoadFile::file('/path/to/employees.csv', $local = true)
    ->into('sell_ins')
    ->columns(['transaction_datetimes','transaction_id','reference_order_number',
    'distributor_type','crtd_by','ctrd_by_desc','organization_id','saldomobo_id','nama_organisasi','outlet_type',
    'dari_node','dari_nama_node','initiator_region','initiator_area','initiator_sales_area','initiator_cluster'
    ,'initiator_micro_cluster','initiator_territoryid','dest_organizationid','dest_saldomobo_id','dest_organizationname',
    'to_outlet_type','ke_node','ke_nama_node','dest_region','dest_area','dest_sales_area','dest_cluster',
    'dest_micro_cluster','dest_teritoryid','produk_kategory','produk_kode','produk_name','qty','rate_unit','operator_id','operator_name'])
    // like this

    ->fieldsTerminatedBy('|')
    ->linesTerminatedBy('\\n')
    ->ignoreLines(11)
    ->load();
    }

    public function import(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:csv'
        ]);

        $path = $request->file('file')->getRealPath();
        $data = Excel::load($path)->get();
        if ($data->count()>0)
        {
            foreach ($data->toArray() as $key => $value) {
                foreach($value as $row)
                {
                    $insert_data[] = array (
                        'transaction_datetimes'     => Carbon::parse($row[0])->format('Y-m-d'),
                        'transaction_id'            => $row[1],
                        'reference_order_number'    => $row[2],
                        'distributor_type'          => $row[3],
                        'crtd_by'                   => $row[4],
                        'ctrd_by_desc'              => $row[5],
                        'organization_id'           => $row[6],
                        'saldomobo_id'              => $row[7],
                        'nama_organisasi'           => $row[8],
                        'outlet_type'               => $row[9],
                        'dari_node'                 => $row[10],
                        'dari_nama_node'            => $row[11],
                        'initiator_region'          => $row[12],
                        'initiator_area'            => $row[13],
                        'initiator_sales_area'      => $row[14],
                        'initiator_cluster'         => $row[15],
                        'initiator_micro_cluster'   => $row[16],
                        'initiator_territoryid'     => $row[17],
                        'dest_organizationid'       => $row[18],
                        'dest_saldomobo_id'         => $row[19],
                        'dest_organizationname'     => $row[20],
                        'to_outlet_type'            => $row[21],
                        'ke_node'                   => $row[22],
                        'ke_nama_node'              => $row[23],
                        'dest_region'               => $row[24],
                        'dest_area'                 => $row[25],
                        'dest_sales_area'           => $row[26],
                        'dest_cluster'              => $row[27],
                        'dest_micro_cluster'        => $row[28],
                        'dest_teritoryid'           => $row[29],
                        'produk_kategory'           => $row[30],
                        'produk_kode'               => $row[31],
                        'produk_name'               => $row[32],
                        'qty'                       => $row[33],
                        'rate_unit'                 => $row[34],
                        'operator_id'               => $row[35],
                        'operator_name'             => $row[36],
                    );
                }
            }
            if (!empty($insert_data)) {
                DB::table('sell_ins')->insert($insert_data);
                 }
        }
        return redirect()->route('upload')->with('success', 'Data Baru Berhasil Ditambahkan!');
    }
         

    public function download(Type $var = null)
    {
        return Excel::download(new SellInExport, 'Sellin.xlsx');
	
    }


    public function download_month(Request $request)
    {
        return Excel::download(new SellInExportMonth, 'Sellin.xlsx');
	
    }



    public function download_daily()
    {
        return Excel::download(new SellInExportDaily, 'Sellin.xlsx');
	
    }
    

    
}
