<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order_number extends Model
{
    use HasFactory;
    protected $table = 'order_numbers';
    protected $connection = 'mysql';

    protected $fillable = ['order_no' , 'text' ];
}
