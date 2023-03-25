<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoregraduacaoRequest;
use App\Http\Requests\UpdategraduacaoRequest;
use App\Repositories\Graduacao\GraduacaoRepository;


class GraduacaoController extends Controller
{
    private $entety;

    public function __construct(GraduacaoRepository $graduaction)
    {
        $this->entety=$graduaction;
    }

    public function index()
    {
     //
        return $this->entety->getGraduactions();
    }

    public function store(StoregraduacaoRequest $request)
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

        return $this->entety->getGraduaction($id);
    }


    public function update(UpdategraduacaoRequest $request, $id)
    {
        //
       return $this->entety->updateGraduaction($request, $id);
    }

    public function destroy($id)
    {
        //
        return $this->entety->apagar($id);
    }
}
