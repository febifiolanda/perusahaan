<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableLowongan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_lowongan', function (Blueprint $table) {
            $table->bigIncrements('id_lowongan');
            $table->string('nama_lowongan');
            $table->string('persyaratan');
            $table->int('periode');
            $table->int('slot');
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
        Schema::dropIfExists('table_lowongan');
    }
}
