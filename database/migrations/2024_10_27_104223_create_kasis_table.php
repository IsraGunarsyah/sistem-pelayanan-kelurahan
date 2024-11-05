<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKasisTable extends Migration
{
    public function up()
    {
        Schema::create('kasis', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('jabatan');
            $table->string('nip');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kasis');
    }
}
