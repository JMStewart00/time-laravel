<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $table->increments('id');
        $table->string('task_name');
        $table->integer('rate');
        $table->timestamps();
        $table->timestamp('clock_in');
        $table->timestamp('clock_out');
        $table->integer('client_id')->unsigned();
        $table->foreign('client_id')->references('id')->on('clients');
        $table->softDeletes();


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
