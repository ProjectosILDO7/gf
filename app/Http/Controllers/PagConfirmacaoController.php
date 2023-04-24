<?php

namespace App\Http\Controllers;

use App\Models\Pagamentos\pag_confirmacao;
use App\Http\Requests\Storepag_confirmacaoRequest;
use App\Http\Requests\Updatepag_confirmacaoRequest;

class PagConfirmacaoController extends Controller
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
     * @param  \App\Http\Requests\Storepag_confirmacaoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storepag_confirmacaoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pagamentos\pag_confirmacao  $pag_confirmacao
     * @return \Illuminate\Http\Response
     */
    public function show(pag_confirmacao $pag_confirmacao)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pagamentos\pag_confirmacao  $pag_confirmacao
     * @return \Illuminate\Http\Response
     */
    public function edit(pag_confirmacao $pag_confirmacao)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatepag_confirmacaoRequest  $request
     * @param  \App\Models\Pagamentos\pag_confirmacao  $pag_confirmacao
     * @return \Illuminate\Http\Response
     */
    public function update(Updatepag_confirmacaoRequest $request, pag_confirmacao $pag_confirmacao)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pagamentos\pag_confirmacao  $pag_confirmacao
     * @return \Illuminate\Http\Response
     */
    public function destroy(pag_confirmacao $pag_confirmacao)
    {
        //
    }
}
