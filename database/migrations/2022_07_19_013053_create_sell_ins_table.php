<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellInsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sell_ins', function (Blueprint $table) {      
            // $table->dateTime('transaction_datetimes');
            $table->id();
            $table->String('transaction_datetimes');
            $table->Integer('transaction_id');
            $table->Integer('reference_order_number')->nullable();
            $table->String('distributor_type')->nullable();
            $table->String('crtd_by')->nullable();
            $table->String('ctrd_by_desc')->nullable();
            $table->Integer('organization_id');
            $table->String('saldomobo_id');
            $table->String('nama_organisasi')->nullable();
            $table->String('outlet_type')->nullable();
            $table->Integer('dari_node')->nullable();
            $table->String('dari_nama_node')->nullable();
            $table->String('initiator_region')->nullable();
            $table->String('initiator_area')->nullable();
            $table->String('initiator_sales_area')->nullable();
            $table->String('initiator_cluster')->nullable();
            $table->String('initiator_micro_cluster')->nullable();
            $table->String('initiator_territoryid')->nullable();
            $table->Integer('dest_organizationid')->nullable();
            $table->Integer('dest_saldomobo_id')->nullable();
            $table->String('dest_organizationname')->nullable();
            $table->String('to_outlet_type')->nullable();
            $table->Integer('ke_node')->nullable();
            $table->String('ke_nama_node')->nullable();
            $table->String('dest_region')->nullable();
            $table->String('dest_area')->nullable();
            $table->String('dest_sales_area')->nullable();
            $table->String('dest_cluster')->nullable();
            $table->String('dest_micro_cluster')->nullable();
            $table->String('dest_teritoryid')->nullable();
            $table->String('produk_kategory')->nullable();
            $table->Integer('produk_kode')->nullable();
            $table->String('produk_name');
            $table->Integer('qty');
            $table->Integer('rate/unit');
            $table->String('operator_id');
            $table->String('operator_name');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sell_ins');
    }
}
