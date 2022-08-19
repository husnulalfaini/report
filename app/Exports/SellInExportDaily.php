<?php

namespace App\Exports;

use App\Models\SellIn;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use DB;
use Illuminate\Http\Request;

class SellInExportDaily implements FromCollection, WithHeadings
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
      
        $hari_ini= date('Y-m-d',strtotime("today"));

        return SellIn::select ('transaction_datetimes','dest_saldomobo_id', 'dest_micro_cluster','dest_cluster', 'produk_name', DB::raw('SUM(qty) as qty') )
        ->GroupBy ('transaction_datetimes','dest_saldomobo_id', 'dest_micro_cluster', 'dest_cluster', 'produk_name')
        ->where('created_at','>=', $hari_ini)
        ->get();
    }
}
