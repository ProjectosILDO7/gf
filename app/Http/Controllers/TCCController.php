<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreT_C_CRequest;
use App\Http\Requests\UpdateT_C_CRequest;
use App\Repositories\Tcc\tccRepository;

class TCCController extends Controller
{
    private $entety;

    public function __construct(tccRepository $tcc)
    {
        $this->entety=$tcc;
    }

    public function index()
    {
     //
        return $this->entety->getTccs();
    }

    public function store(StoreT_C_CRequest $request)
    {
        return $this->entety->create($request);
    }

    public function show($id)
    {
        return $this->entety->detalhes($id);
    }

    public function edit($id)
    {

        return $this->entety->getTcc($id);
    }

    public function update(UpdateT_C_CRequest $request, $id)
    {
        //
       return $this->entety->updateTcc($request, $id);
    }

    public function destroy($id)
    {
        //
        return $this->entety->apagar($id);
    }
}
