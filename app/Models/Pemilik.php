<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemilik extends Model
{
    protected $table = "pemilik";
 
    protected $fillable = ['image','nama','posisi'];
}
