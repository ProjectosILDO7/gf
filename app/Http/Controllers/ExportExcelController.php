<?php

namespace App\Http\Controllers;

use App\Exports\Disciplinas_cursosExport;
use App\Exports\emolumentoExport;
use App\Models\Emolumento;
use Maatwebsite\Excel\Facades\Excel;

class ExportExcelController extends Controller
{
    public function export() 
    {
        return Excel::download(new Disciplinas_cursosExport, 'disciplinas e cursos.xlsx');
    }

    public function exportEmolumento($user) 
    {
        
        return Excel::download(new emolumentoExport($user), 'Lista de emolumentos.xlsx');
    }

}
