<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posting extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected $fillable = [
        'nama',
        'harga',
        'deskripsi',
        'kondisi',
        'lokasi',
        'kategori',
        'picturePath1',
        'picturePath2',
        'picturePath3',
        'favorite',
        'namaProfile',
        'photoProfile',
        'desa',
        'kecamatan',
        'kabupaten',
        'user_id'
    ];

    // public function user(){
    //     return $this->belongsTo(User::class);
    // }
}
