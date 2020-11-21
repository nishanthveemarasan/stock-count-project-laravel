<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class logout extends Model
{
    use HasFactory;

    protected $table = 'logouts';
    protected $connection = 'mysql';

    protected $fillable = ['user_id'];

    public function users()
    {
        return $this->belongsTo('App\Models\User');
    }

}
