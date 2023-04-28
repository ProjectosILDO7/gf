<?php

namespace App\Http\Controllers;

use App\Models\pag_mensalidade;
use App\Http\Requests\Storepag_mensalidadeRequest;
use App\Http\Requests\Updatepag_mensalidadeRequest;

class PagMensalidadeController extends Controller
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
     * @param  \App\Http\Requests\Storepag_mensalidadeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storepag_mensalidadeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pag_mensalidade  $pag_mensalidade
     * @return \Illuminate\Http\Response
     */
    public function show(pag_mensalidade $pag_mensalidade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pag_mensalidade  $pag_mensalidade
     * @return \Illuminate\Http\Response
     */
    public function edit(pag_mensalidade $pag_mensalidade)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatepag_mensalidadeRequest  $request
     * @param  \App\Models\pag_mensalidade  $pag_mensalidade
     * @return \Illuminate\Http\Response
     */
    public function update(Updatepag_mensalidadeRequest $request, pag_mensalidade $pag_mensalidade)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pag_mensalidade  $pag_mensalidade
     * @return \Illuminate\Http\Response
     */
    public function destroy(pag_mensalidade $pag_mensalidade)
    {
        //
    }
}
