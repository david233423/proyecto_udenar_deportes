<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    protected $table = 'eventos';
    protected $primaryKey = 'codevento';
    public $timestamps = 'true';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}