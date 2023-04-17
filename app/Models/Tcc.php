<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tcc extends Model
{
    use HasFactory;

    protected $fillable=[
        'user_id',
        'cobranca',
    ];

    public function cursos(){
        return $this->belongsToMany(curso::class, 'curso_tccs');
    }
}
