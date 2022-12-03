<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id_employee');
            $table->string('nama');
            $table->string('company');
            $table->string('company_contact');
            $table->string('email')->unique();
            $table->text('img_profil')->nullable();
            $table->string('status')->nullable();
            $table->string('token')->nullable();
            $table->string('level');
            $table->text('password')->nullable();
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
        Schema::dropIfExists('users');
    }
}
