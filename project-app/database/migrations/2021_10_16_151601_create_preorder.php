<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreorder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preOrders', function (Blueprint $table) {
        $table->integer('preOrderNumber')->primary();  
        $table->integer('customerNumber');
        $table->integer('orderNumber');
        $table->integer('upFrontPaid');
        $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('preOrders');
    }
}
