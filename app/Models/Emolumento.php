<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emolumento extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id',
        'emolumento',
        'cobranca'
    ];

    public function users(){
        return $this->belongosTo(User::class);
    }
}
