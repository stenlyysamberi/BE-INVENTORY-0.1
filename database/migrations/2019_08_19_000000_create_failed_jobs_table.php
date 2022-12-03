<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFailedJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stoks', function (Blueprint $table) {
            $table->bigIncrements('id_store');
            $table->unsignedBigInteger('id_material');
            $table->unsignedBigInteger('id_employee');
            $table->text('remark');
            $table->string('total');
            $table->string('status');

            $table->foreign('id_material')->references('id_material')->on('materials')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_employee')->references('id_employee')->on('users')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('tbl_store');
    }
}
