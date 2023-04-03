<?php

namespace App\Http\Controllers;

use App\Exports\Disciplinas_cursosExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportExcelController extends Controller
{
    public function export() 
    {
        //return (new Disciplinas_cursosExport)->download('disciplinas.xlsx');
        return Excel::download(new Disciplinas_cursosExport, 'disciplinas.xlsx');
    }
}
