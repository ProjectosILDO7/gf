<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Multa extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id',
        'curso_id',
        'cobranca'
    ];

    public function cursos(){
        return $this->belongsToMany(curso::class, 'curso_multas');
    }
}
