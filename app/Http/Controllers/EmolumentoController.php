<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmolumentoRequest;
use App\Http\Requests\UpdateEmolumentoRequest;
use App\Repositories\Emolumentos\emolumentosRepository;

class EmolumentoController extends Controller
{
    private $entety;

    public function __construct(emolumentosRepository $emolumento)
    {
        $this->entety=$emolumento;
    }

    public function index()
    {
     //
        return $this->entety->getEmolumentos();
    }

    public function store(StoreEmolumentoRequest $request)
    {
        return $this->entety->create($request);
    }

    public function show($id)
    {
        return $this->entety->detalhes($id);
    }

    public function edit($id)
    {

        return $this->entety->getEmolumento($id);
    }

    public function update(UpdateEmolumentoRequest $request, $id)
    {
        //
       return $this->entety->updateEmolumento($request, $id);
    }

    public function destroy($id)
    {
        //
        return $this->entety->apagar($id);
    }


}
