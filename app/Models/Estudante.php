<?php

namespace App\Models;

use App\Models\Pagamentos\pag_mensalidade;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudante extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id',
        'curso_id',
        'grade_id',
        'image',
        'nome',
        'numBI',
        'organization_id',
    ];

    public function cursos(){
        return $this->belongsTo(curso::class, 'curso_id', 'id');
    }

    public function graduacoes(){
        return $this->belongsTo(graduacao::class, 'grade_id', 'id');
    }

    public function organization(){
        return $this->belongsTo(User::class, 'organization_id');
    }

    public function users(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function senhas(){
        return $this->hasOne(reserva_senha_estudante::class, 'estudante_id', 'id');
    }

    public function mensalidades(){
        return $this->hasMany(pag_mensalidade::class, 'estudante_id');
    }
}
