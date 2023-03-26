<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEstudanteRequest;
use App\Http\Requests\UpdateEstudanteRequest;
use App\Repositories\Estudantes\EstudanteRepository;

class EstudanteController extends Controller
{
    private $entety;

    public function __construct(EstudanteRepository $estudante)
    {
        $this->entety=$estudante;
    }

    public function index()
    {
     //
        return $this->entety->getEstudantes();
    }

    public function store(StoreEstudanteRequest $request)
    {
        return $this->entety->create($request);
    }

    public function show($id)
    {
        //
        return $this->entety->detalhes($id);
    }


    public function edit($id)
    {

        return $this->entety->getEstudante($id);
    }


    public function update(UpdateEstudanteRequest $request, $id)
    {
        //
       return $this->entety->updateEstudante($request, $id);
    }

    public function destroy($id)
    {
        //
        return $this->entety->apagar($id);
    }
}
