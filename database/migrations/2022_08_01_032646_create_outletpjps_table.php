<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOutletpjpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outletpjps', function (Blueprint $table) {
            $table->String('area');
            $table->String('sales_area');
            $table->String('cluster');
            $table->String('micro_cluster');
            $table->String('id_outlet');
            $table->String('outlet_name');
            $table->String('pjp');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('outletpjps');
    }
}
