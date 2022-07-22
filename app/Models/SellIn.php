<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellIn extends Model
{
    use HasFactory;

    // protected $casts = [
    //     'created_at',
    //     'updated_at'
    // ];
    protected $fillable = ['transaction_datetimes','transaction_id','reference_order_number','distributor_type','crtd_by','ctrd_by_desc','organization_id','saldomobo_id','nama_organisasi','outlet_type','dari_node','dari_nama_node','initiator_region','initiator_area','initiator_sales_area','initiator_cluster','initiator_micro_cluster','initiator_territoryid','dest_organizationid','dest_saldomobo_id','dest_organizationname','to_outlet_type','ke_node','ke_nama_node','dest_region','dest_area','dest_sales_area','dest_cluster','dest_micro_cluster','dest_teritoryid','produk_kategory','produk_kode','produk_name','qty','rate/unit','operator_id','operator_name','created_at','updated_at'];
}
