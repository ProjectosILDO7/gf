<?php

namespace App\Http\Controllers;

use App\Exports\Disciplinas_cursosExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportExcelController extends Controller
{
    public function export() 
    {
        return Excel::download(new Disciplinas_cursosExport, 'disciplinas e cursos.xlsx');
    }
}
