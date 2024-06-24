<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeasiswasTable extends Migration
{
    public function up()
    {
        Schema::create('beasiswas', function (Blueprint $table) {
            $table->id('idBeasiswa'); 
            $table->string('namaBeasiswa');
            $table->string('jenisBeasiswa')->default('Internal');
            $table->unsignedBigInteger('periode_id')->nullable()->default(null); 
            $table->timestamps();


            $table->foreign('periode_id')->references('id')->on('periodes')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('beasiswas');
    }
}


