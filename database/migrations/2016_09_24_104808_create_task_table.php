<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaskTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('tasks', function (Blueprint $table) {

            $table->increments('id');
            $table->string('task_number')->nullable();
            $table->double('project_cost')->nullable();
            $table->double('actual_cost')->nullable();
            $table->double('number_of_units')->nullable();
            $table->double('unit_cost')->nullable();
            $table->string('unit')->nullable();
            $table->integer('invoice_id')->unsigned()->nullable();
            $table->foreign('invoice_id')->references('id')->on('invoices'); 
            $table->date('booked_month');
            $table->integer('created_by')->unsigned();
            $table->foreign('created_by')->references('id')->on('users');
            $table->integer('last_update_by')->unsigned();
            $table->foreign('last_update_by')->references('id')->on('users');
            $table->timestamps();
        } );

        Schema::enableForeignKeyConstraints();

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tasks');
    }
}


