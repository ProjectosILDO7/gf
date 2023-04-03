<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDisciplinaRequest;
use App\Http\Requests\UpdateDisciplinaRequest;
use App\Repositories\Disciplinas\disciplinasRepository;

class DisciplinaController extends Controller
{
    private $entety;

    public function __construct(disciplinasRepository $disciplina)
    {
        $this->entety=$disciplina;
    }

    public function index()
    {
     //
        return $this->entety->getDisciplinas();
    }

    public function store(StoreDisciplinaRequest $request)
    {
        return $this->entety->create($request);
    }

    public function show($id)
    {
        return $this->entety->detalhes($id);
    }

    public function showDisciplinasEmCursos()
    {
        return $this->entety->disciplinasEmCursos();
    }

    public function edit($id)
    {

        return $this->entety->getDisciplina($id);
    }

    public function update(UpdateDisciplinaRequest $request, $id)
    {
        //
       return $this->entety->updateDisciplina($request, $id);
    }

    public function destroy($id)
    {
        //
        return $this->entety->apagar($id);
    }

}
