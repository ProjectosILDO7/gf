<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class graduacao extends Model
{
    use HasFactory;
    protected $fillable=[
        'grade',
        'user_id'
    ];

    public function cursos(){
        return $this->belongsToMany(curso::class, 'curso_grades', 'grade_id');
    }
}
