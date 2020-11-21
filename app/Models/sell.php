<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sell extends Model
{
    use HasFactory;
    
    protected $table = 'sell';
    protected $connection = 'mysql';

    protected $fillable = ['order_number' , 'itemname' , 'sell_type' , 'sellcount' , 'note'];
}
