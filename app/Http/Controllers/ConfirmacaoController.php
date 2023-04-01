<?php

namespace App\Http\Controllers;

use App\Models\Confirmacao;
use App\Http\Requests\StoreConfirmacaoRequest;
use App\Http\Requests\UpdateConfirmacaoRequest;

class ConfirmacaoController extends Controller
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
     * @param  \App\Http\Requests\StoreConfirmacaoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreConfirmacaoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Confirmacao  $confirmacao
     * @return \Illuminate\Http\Response
     */
    public function show(Confirmacao $confirmacao)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Confirmacao  $confirmacao
     * @return \Illuminate\Http\Response
     */
    public function edit(Confirmacao $confirmacao)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateConfirmacaoRequest  $request
     * @param  \App\Models\Confirmacao  $confirmacao
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateConfirmacaoRequest $request, Confirmacao $confirmacao)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Confirmacao  $confirmacao
     * @return \Illuminate\Http\Response
     */
    public function destroy(Confirmacao $confirmacao)
    {
        //
    }
}
