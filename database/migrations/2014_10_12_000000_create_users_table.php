<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //User
        Schema::create('user', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->integer('umur');
            $table->string('alamat');
            $table->integer('nomor_hp');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        //Users multi level : admin, pakar, dan User
        //Admin
        /*
*/

        //Pakar
        /*
*/


        //Hasil
        /*
        Schema::create('hasil', function (Blueprint $table) {
            $table->id();
            $table->string('tanggal');
            $table->integer('gejala');
            $table->string('user_id');
            $table->rememberToken();
            $table->timestamps();
        });*/

        //Gejala
        /*
        Schema::create('gejala', function (Blueprint $table) {
            $table->id();
            $table->string('kode_gejala');
            $table->string('nama_gejala');
            $table->rememberToken();
            $table->timestamps();
        });*/
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
};
