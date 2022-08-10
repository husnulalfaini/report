<?php

namespace App\Exports;

use App\Models\SellIn;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use DB;

class SellInExport implements FromCollection, WithHeadings
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
        return SellIn::select ('transaction_datetimes','dest_saldomobo_id', 'dest_micro_cluster','dest_cluster', 'produk_name', DB::raw('SUM(qty) as qty') )
        ->GroupBy ('transaction_datetimes','dest_saldomobo_id', 'dest_micro_cluster', 'dest_cluster', 'produk_name')
        ->get();
    }
}
