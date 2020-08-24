<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {


         Schema::table('purchases', function(Blueprint $table) {
             $table->dropColumn(['code','price','quantity','supplier_name','item_name'])->change();
             $table->unsignedBigInteger('supplier_id');
             $table->double('total');
             $table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('cascade');
         });

        Schema::table('sales', function(Blueprint $table) {
            $table->dropColumn(['code','price','quantity','customer_name','item_name'])->change();
            $table->unsignedBigInteger('customer_id');
            $table->double('total');
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
