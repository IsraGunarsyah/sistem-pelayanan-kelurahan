<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRtsTable extends Migration
{
    public function up()
    {
        Schema::create('rts', function (Blueprint $table) {
            $table->id();
            $table->integer('rt');
            $table->string('nama'); 
            $table->string('alamat');
            $table->string('no_telpon'); 
            $table->string('email'); 
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']); // Gender
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('rts');
    }
}
