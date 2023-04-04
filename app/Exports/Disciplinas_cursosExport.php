<?php

namespace App\Exports;

use App\Models\Disciplina;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;

class Disciplinas_cursosExport implements ShouldAutoSize, FromView
{
    
    public function view(): View
    {
        return view('exports.Export_disciplinas_cursos', [
            'disciplinas' => Disciplina::with('cursos')->get()
        ]);
    }
    
}
