<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->date('bill_date');
            $table->string('supplier_name');
            $table->unsignedInteger('code');
            $table->string('item_name');
            $table->unsignedDouble('quantity');
            $table->unsignedDouble('price');
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
        Schema::dropIfExists('purchases');
    }
}
