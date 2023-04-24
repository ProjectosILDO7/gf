<?php

namespace App\Http\Controllers;

use App\Models\Pagamentos\pag_transporte;
use App\Http\Requests\Storepag_transporteRequest;
use App\Http\Requests\Updatepag_transporteRequest;

class PagTransporteController extends Controller
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
     * @param  \App\Http\Requests\Storepag_transporteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storepag_transporteRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pagamentos\pag_transporte  $pag_transporte
     * @return \Illuminate\Http\Response
     */
    public function show(pag_transporte $pag_transporte)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pagamentos\pag_transporte  $pag_transporte
     * @return \Illuminate\Http\Response
     */
    public function edit(pag_transporte $pag_transporte)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatepag_transporteRequest  $request
     * @param  \App\Models\Pagamentos\pag_transporte  $pag_transporte
     * @return \Illuminate\Http\Response
     */
    public function update(Updatepag_transporteRequest $request, pag_transporte $pag_transporte)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pagamentos\pag_transporte  $pag_transporte
     * @return \Illuminate\Http\Response
     */
    public function destroy(pag_transporte $pag_transporte)
    {
        //
    }
}
