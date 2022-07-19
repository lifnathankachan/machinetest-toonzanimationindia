<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class task extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'user_id',
        'date',
        'start_time',
        'end_time',
        'status'
    ];

    public function user()
    {
        return $this->hasOne('App\Models\User','id', 'user_id');
    }
}
