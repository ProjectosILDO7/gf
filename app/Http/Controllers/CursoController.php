<?php

namespace App\Http\Controllers;

use App\Models\curso;
use App\Http\Requests\StorecursoRequest;
use App\Http\Requests\UpdatecursoRequest;
use App\Repositories\Cursos\CursosRepository;

class CursoController extends Controller
{
    
    private $entety;

    public function __construct(CursosRepository $cursos)
    {
        $this->entety=$cursos;
    }

    public function index()
    {
     //
        return $this->entety->getCourses();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorecursoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorecursoRequest $request)
    {
        return $this->entety->create($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function show(curso $curso)
    {
        //
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        return $this->entety->getCourse($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatecursoRequest  $request
     * @param  \App\Models\curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatecursoRequest $request, $id)
    {
        //
       return $this->entety->updateCurso($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        return $this->entety->apagar($id);
    }
}
