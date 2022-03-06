<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $table = "about";
 
    protected $fillable = ['id','image','deskripsi','client'];
}
