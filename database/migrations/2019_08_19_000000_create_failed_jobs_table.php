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
        Schema::create('tbl_store', function (Blueprint $table) {
            $table->bigIncrements('id_store');
            $table->unsignedBigInteger('id_material');
            $table->unsignedBigInteger('id_employee');
            $table->text('remark');
            $table->integer('qyt',5);
            $table->string('status',3);

            // $table->foreign('id_material')->references('id_material')->on('tbl_materials');
            // $table->foreign('id_employee')->references('id_employee')->on('tbl_employee');
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
        Schema::dropIfExists('failed_jobs');
    }
}
