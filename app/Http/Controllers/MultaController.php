<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMultaRequest;
use App\Http\Requests\UpdateMultaRequest;
use App\Repositories\Multas\multasRepository;

class MultaController extends Controller
{
    private $entety;

    public function __construct(multasRepository $multa)
    {
        $this->entety=$multa;
    }

    public function index()
    {
     //
        return $this->entety->getMultas();
    }

    public function store(StoreMultaRequest $request)
    {
        return $this->entety->create($request);
    }

    public function show($id)
    {
        return $this->entety->detalhes($id);
    }

    public function edit($id)
    {

        return $this->entety->getMulta($id);
    }

    public function update(UpdateMultaRequest $request, $id)
    {
        //
       return $this->entety->updateMulta($request, $id);
    }

    public function destroy($id)
    {
        //
        return $this->entety->apagar($id);
    }
}
