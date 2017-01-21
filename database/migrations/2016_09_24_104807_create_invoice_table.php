<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            //
            $table->increments('id');
            $table->string('invoice_number');
            $table->string('invoice_description');
            $table->float('cost');
            $table->string('invoice_file');
            $table->date('date_recieved');
            $table->date('date_approved')->nullable();
            $table->integer('uploaded_by')->unsigned();
            $table->foreign('uploaded_by')->references('id')->on('users');
            $table->integer('last_update_by')->unsigned();
            $table->foreign('last_update_by')->references('id')->on('users');
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
         Schema::drop('invoices');
    }
}
