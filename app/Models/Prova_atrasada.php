<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prova_atrasada extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id',
        'cobranca',
    ];

    public function disciplinas(){
        return $this->belongsToMany(Disciplina::class, 'disciplina_prova_atrasadas');
    }
}
