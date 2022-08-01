<?php

namespace App\Imports;

use App\Models\Sellin;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Carbon\Carbon;

class SellinImport implements ToModel, WithStartRow, WithCustomCsvSettings
{
    public function startRow(): int
    {
        return 11;
    }

    public function getCsvSettings(): array
    {
        return [
            'delimiter' => '|'
        ];
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Sellin([
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
            // 'created_at'                => $row[36],
            // 'updated_at'                => $row[37],
        ]);
    }
}