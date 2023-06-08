<?php

namespace App\Http\Controllers;

use App\Models\totalPresenca;

class graficosController extends Controller
{
    public function graficoDeBarra(){
        $presencas = totalPresenca::with('totalPresencas')->get();
        dd($presencas);
    }
}
