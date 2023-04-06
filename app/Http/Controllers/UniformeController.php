<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUniformeRequest;
use App\Http\Requests\UpdateUniformeRequest;
use App\Repositories\Uniformes\uniformeRepository;

class UniformeController extends Controller
{
    private $entety;

    public function __construct(uniformeRepository $uniforme)
    {
        $this->entety=$uniforme;
    }

    public function index()
    {
     //
        return $this->entety->getUniformes();
    }

    public function store(StoreUniformeRequest $request)
    {
        return $this->entety->create($request);
    }

    public function show($id)
    {
        return $this->entety->detalhes($id);
    }

    public function edit($id)
    {

        return $this->entety->geUniforme($id);
    }

    public function update(UpdateUniformeRequest $request, $id)
    {
        //
       return $this->entety->updateUniforme($request, $id);
    }

    public function destroy($id)
    {
        //
        return $this->entety->apagar($id);
    }

}
