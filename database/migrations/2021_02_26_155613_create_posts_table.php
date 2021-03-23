<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
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
            $table->enum('kondisi', ['baru', 'bekas'])->nullable();
            
            $table->string('lokasi');
            $table->string('desa')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('kabupaten')->nullable();
            
            $table->enum('kategori', ['transportasi', 'elektronik', 'kuliner', 'fashion', 'sembako']);
            
            $table->longText('picturePath1')->nullable();
            $table->longText('picturePath2')->nullable();
            $table->longText('picturePath3')->nullable();
            $table->boolean('favorite')->default(false);
            $table->string('namaProfile');
            $table->string('photoProfile');
            
            $table->string('user_id');
            $table->string('phoneNumber');
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
        Schema::dropIfExists('posts');
    }
}
