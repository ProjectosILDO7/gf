<?php

namespace App\Http\Controllers;

use App\Models\Uniforme;
use App\Http\Requests\StoreUniformeRequest;
use App\Http\Requests\UpdateUniformeRequest;

class UniformeController extends Controller
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
     * @param  \App\Http\Requests\StoreUniformeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUniformeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Uniforme  $uniforme
     * @return \Illuminate\Http\Response
     */
    public function show(Uniforme $uniforme)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Uniforme  $uniforme
     * @return \Illuminate\Http\Response
     */
    public function edit(Uniforme $uniforme)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUniformeRequest  $request
     * @param  \App\Models\Uniforme  $uniforme
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUniformeRequest $request, Uniforme $uniforme)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Uniforme  $uniforme
     * @return \Illuminate\Http\Response
     */
    public function destroy(Uniforme $uniforme)
    {
        //
    }
}
