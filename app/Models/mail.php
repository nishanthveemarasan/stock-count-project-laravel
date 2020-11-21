<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mail extends Model
{
    use HasFactory;
    protected $table = 'mails';
    protected $connection = 'mysql';

    protected $fillable = ['from' , 'to' , 'content' ];
}
