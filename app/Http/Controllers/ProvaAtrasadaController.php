<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProva_atrasadaRequest;
use App\Http\Requests\UpdateProva_atrasadaRequest;
use App\Repositories\Prova_atrasada\provaAtrasadaRepository;

class ProvaAtrasadaController extends Controller
{
    private $entety;

    public function __construct(provaAtrasadaRepository $prova_atrasada)
    {
        $this->entety=$prova_atrasada;
    }

    public function index()
    {
     //
        return $this->entety->getProva_atrasadas();
    }

    public function store(StoreProva_atrasadaRequest $request)
    {
        return $this->entety->create($request);
    }

    public function show($id)
    {
        return $this->entety->detalhes($id);
    }

    public function edit($id)
    {

        return $this->entety->getProva_atrasada($id);
    }

    public function update(UpdateProva_atrasadaRequest $request, $id)
    {
        //
       return $this->entety->updateProva_atrasada($request, $id);
    }

    public function destroy($id)
    {
        //
        return $this->entety->apagar($id);
    }
}
