<?php

namespace App\Exports;

use App\Models\Disciplina;
use Maatwebsite\Excel\Concerns\FromCollection;

class Disciplinas_cursosExport implements FromCollection
{
    
    public function collection()
    {
        return Disciplina::with('cursos')->get();
    }

}
