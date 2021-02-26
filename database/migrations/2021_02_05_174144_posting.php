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
            $table->enum('kategori', ['transportasi', 'elektronik', 'kuliner', 'fashion', 'sembako']);
            $table->longText('picturePath')->nullable();
            $table->boolean('favorite')->default(false);
            $table->string('namaProfile');
            $table->string('photoProfile');
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
