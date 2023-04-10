<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreConfirmacaoRequest;
use App\Http\Requests\UpdateConfirmacaoRequest;
use App\Repositories\Confirmacao\confirmacaoRepository;

class ConfirmacaoController extends Controller
{
    private $entety;

    public function __construct(confirmacaoRepository $confirmacao)
    {
        $this->entety=$confirmacao;
    }

    public function index()
    {
     //
        return $this->entety->getConfirmacaos();
    }

    public function store(StoreConfirmacaoRequest $request)
    {
        return $this->entety->create($request);
    }

    public function show($id)
    {
        return $this->entety->detalhes($id);
    }

    public function edit($id)
    {

        return $this->entety->getConfirmacao($id);
    }

    public function update(UpdateConfirmacaoRequest $request, $id)
    {
        //
       return $this->entety->updateConfirmacao($request, $id);
    }

    public function destroy($id)
    {
        //
        return $this->entety->apagar($id);
    }
}
