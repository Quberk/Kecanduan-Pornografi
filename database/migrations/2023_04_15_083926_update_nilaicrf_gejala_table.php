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
        Schema::dropIfExists('gejala');
        Schema::create('gejala', function (Blueprint $table) {
            $table->id();
            $table->string('kode_gejala');
            $table->string('nama_gejala');
            $table->string('pertanyaan');
            $table->float('nilai_cf');
            $table->rememberToken();
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
        //
    }
};
