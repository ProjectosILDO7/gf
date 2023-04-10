<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Confirmacao extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id',
        'cobranca'
    ];

    public function graduacoes(){
        return $this->belongsToMany(graduacao::class, 'confirmacao_graduacaos');
    }

}
