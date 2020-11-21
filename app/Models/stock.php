<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class stock extends Model
{
    use HasFactory;

    protected $table = 'stock';
    protected $connection = 'mysql';

    protected $fillable = ['itemname' , 'itemcode' , 'count'];
}
