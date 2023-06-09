<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disciplina extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id',
        'cadeira',
        'curso_id',
        'disciplina_id'
    ];

    public function cursos(){
        return $this->belongsToMany(curso::class, 'curso_disciplinas')->withPivot('curso_id', 'disciplina_id');
    }
}
