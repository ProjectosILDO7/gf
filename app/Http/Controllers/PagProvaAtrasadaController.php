<?php

namespace App\Http\Controllers;

use App\Models\Pagamentos\pag_provaAtrasada;
use App\Http\Requests\Storepag_provaAtrasadaRequest;
use App\Http\Requests\Updatepag_provaAtrasadaRequest;

class PagProvaAtrasadaController extends Controller
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
     * @param  \App\Http\Requests\Storepag_provaAtrasadaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storepag_provaAtrasadaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pagamentos\pag_provaAtrasada  $pag_provaAtrasada
     * @return \Illuminate\Http\Response
     */
    public function show(pag_provaAtrasada $pag_provaAtrasada)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pagamentos\pag_provaAtrasada  $pag_provaAtrasada
     * @return \Illuminate\Http\Response
     */
    public function edit(pag_provaAtrasada $pag_provaAtrasada)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatepag_provaAtrasadaRequest  $request
     * @param  \App\Models\Pagamentos\pag_provaAtrasada  $pag_provaAtrasada
     * @return \Illuminate\Http\Response
     */
    public function update(Updatepag_provaAtrasadaRequest $request, pag_provaAtrasada $pag_provaAtrasada)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pagamentos\pag_provaAtrasada  $pag_provaAtrasada
     * @return \Illuminate\Http\Response
     */
    public function destroy(pag_provaAtrasada $pag_provaAtrasada)
    {
        //
    }
}
