<?php

namespace App\Http\Controllers;

use App\Models\Pagamentos\pag_comparticipacao;
use App\Http\Requests\Storepag_comparticipacaoRequest;
use App\Http\Requests\Updatepag_comparticipacaoRequest;

class PagComparticipacaoController extends Controller
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
     * @param  \App\Http\Requests\Storepag_comparticipacaoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storepag_comparticipacaoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pagamentos\pag_comparticipacao  $pag_comparticipacao
     * @return \Illuminate\Http\Response
     */
    public function show(pag_comparticipacao $pag_comparticipacao)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pagamentos\pag_comparticipacao  $pag_comparticipacao
     * @return \Illuminate\Http\Response
     */
    public function edit(pag_comparticipacao $pag_comparticipacao)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatepag_comparticipacaoRequest  $request
     * @param  \App\Models\Pagamentos\pag_comparticipacao  $pag_comparticipacao
     * @return \Illuminate\Http\Response
     */
    public function update(Updatepag_comparticipacaoRequest $request, pag_comparticipacao $pag_comparticipacao)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pagamentos\pag_comparticipacao  $pag_comparticipacao
     * @return \Illuminate\Http\Response
     */
    public function destroy(pag_comparticipacao $pag_comparticipacao)
    {
        //
    }
}
