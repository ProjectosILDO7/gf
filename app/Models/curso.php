<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class curso extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'cursos',
        'cobranca',
        'user_id'
    ];

    public function graduacoes(){
        return $this->belongsToMany(graduacao::class, 'curso_grades');
    }
}
