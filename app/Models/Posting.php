<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posting extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected $fillable = [
        'nama', 'harga', 'deskripsi', 'kondisi', 'lokasi', 'kategori', 'picturePath', 'favorite', 'namaProfile', 'photoProfile'
    ];
}
