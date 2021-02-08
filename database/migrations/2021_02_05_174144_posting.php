<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Posting extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->integer('harga');
            $table->longText('deskripsi');
            $table->enum('kondisi', ['baru', 'bekas']);
            $table->string('lokasi');
            $table->enum('kategori', ['kendaraan', 'elektronik', 'kuliner', 'fashion']);
            $table->text('picturePath')->nullable();
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
}
