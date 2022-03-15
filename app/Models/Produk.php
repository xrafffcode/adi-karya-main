<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = "produk";
 
    protected $fillable = ['nama_produk','deskripsi_proudk','gambar_1','gambar_2','gambar_3'];
}
