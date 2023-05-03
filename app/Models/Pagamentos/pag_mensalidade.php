<?php

namespace App\Models\Pagamentos;

use App\Models\Estudante;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pag_mensalidade extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id',
        'estudante_id',
        'valor_mensalidade',
        'data_pagamento',
    ];

    public function estudante(){
        return $this->belongsTo(Estudante::class);
    }
}
