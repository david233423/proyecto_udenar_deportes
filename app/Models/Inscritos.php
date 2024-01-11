<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscritos extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigo',
        'carrera',
        'semestre',
        'numero_celular',
    ];

    protected $table = 'inscripciones';

    public function eventos(){
        return $this->belongsToMany(Events::class, 'inscripciones_eventos');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function eve()
    {
        return $this->belongsTo(Events::class, 'evento_codevento');
    }

}