<?php

namespace App\Http\Controllers;

use App\Models\Pagamentos\pag_uniforme;
use App\Http\Requests\Storepag_uniformeRequest;
use App\Http\Requests\Updatepag_uniformeRequest;

class PagUniformeController extends Controller
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
     * @param  \App\Http\Requests\Storepag_uniformeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storepag_uniformeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pagamentos\pag_uniforme  $pag_uniforme
     * @return \Illuminate\Http\Response
     */
    public function show(pag_uniforme $pag_uniforme)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pagamentos\pag_uniforme  $pag_uniforme
     * @return \Illuminate\Http\Response
     */
    public function edit(pag_uniforme $pag_uniforme)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatepag_uniformeRequest  $request
     * @param  \App\Models\Pagamentos\pag_uniforme  $pag_uniforme
     * @return \Illuminate\Http\Response
     */
    public function update(Updatepag_uniformeRequest $request, pag_uniforme $pag_uniforme)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pagamentos\pag_uniforme  $pag_uniforme
     * @return \Illuminate\Http\Response
     */
    public function destroy(pag_uniforme $pag_uniforme)
    {
        //
    }
}
