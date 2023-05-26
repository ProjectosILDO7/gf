<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class curso extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'cursos',
        'departamento_id',
        'cobranca',
        'user_id'
    ];

    //Relacionamento com as tabelas de graduacao e Disciplina

    public function graduacoes(){
        return $this->belongsToMany(graduacao::class, 'curso_grades', 'curso_id', 'grade_id');
    }

    public function disciplinas(){
        return $this->belongsToMany(Disciplina::class, 'curso_disciplinas',);
    }

    public function departamento(){
        return $this->belongsTo(Departamento::class, );
    }
}
