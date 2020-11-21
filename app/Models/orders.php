<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $connection = 'mysql';

    protected $fillable = ['order_number' , 'itemname' , 'sell_type' , 'sellcount' , 'note'];
}
