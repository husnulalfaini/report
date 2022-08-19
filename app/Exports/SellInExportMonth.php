<?php

namespace App\Exports;

use App\Models\SellIn;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use DB;
use Illuminate\Http\Request;

class SellInExportMonth implements FromCollection, WithHeadings
{
    public function headings(): array
    {
        return ["Tanggal", "Dest Saldomobo ID", "Micro Cluster", "Cluster", "Produk Name", "QTY"];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $request=null;
        if($request->input ('datepicker') == null){
            $tanggal  = Date("Y-m-d",strtotime('now'));
        }
        else {

            $tanggal = '01-'.$request->datepicker;
        }

        $awalbulan= date('Y-m-d',strtotime("first day of " . $tanggal));
        $akhirbulan= date('Y-m-d',strtotime("last day of " . $tanggal));

        return SellIn::select ('transaction_datetimes','dest_saldomobo_id', 'dest_micro_cluster','dest_cluster', 'produk_name', DB::raw('SUM(qty) as qty') )
        ->GroupBy ('transaction_datetimes','dest_saldomobo_id', 'dest_micro_cluster', 'dest_cluster', 'produk_name')
        ->where('transaction_datetimes','>=', $awalbulan)
        ->where('transaction_datetimes','<=', $akhirbulan)
        ->get();
    }
}
