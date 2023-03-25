<?php

namespace App\Http\Controllers;

use App\Models\curso_grades;
use App\Http\Requests\Storecurso_gradesRequest;
use App\Http\Requests\Updatecurso_gradesRequest;

class CursoGradesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\Storecurso_gradesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storecurso_gradesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\curso_grades  $curso_grades
     * @return \Illuminate\Http\Response
     */
    public function show(curso_grades $curso_grades)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\curso_grades  $curso_grades
     * @return \Illuminate\Http\Response
     */
    public function edit(curso_grades $curso_grades)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatecurso_gradesRequest  $request
     * @param  \App\Models\curso_grades  $curso_grades
     * @return \Illuminate\Http\Response
     */
    public function update(Updatecurso_gradesRequest $request, curso_grades $curso_grades)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\curso_grades  $curso_grades
     * @return \Illuminate\Http\Response
     */
    public function destroy(curso_grades $curso_grades)
    {
        //
    }
}
