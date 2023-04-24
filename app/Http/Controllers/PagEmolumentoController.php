<?php

namespace App\Http\Controllers;

use App\Models\Pagamentos\pag_emolumento;
use App\Http\Requests\Storepag_emolumentoRequest;
use App\Http\Requests\Updatepag_emolumentoRequest;

class PagEmolumentoController extends Controller
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
     * @param  \App\Http\Requests\Storepag_emolumentoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storepag_emolumentoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pagamentos\pag_emolumento  $pag_emolumento
     * @return \Illuminate\Http\Response
     */
    public function show(pag_emolumento $pag_emolumento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pagamentos\pag_emolumento  $pag_emolumento
     * @return \Illuminate\Http\Response
     */
    public function edit(pag_emolumento $pag_emolumento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatepag_emolumentoRequest  $request
     * @param  \App\Models\Pagamentos\pag_emolumento  $pag_emolumento
     * @return \Illuminate\Http\Response
     */
    public function update(Updatepag_emolumentoRequest $request, pag_emolumento $pag_emolumento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pagamentos\pag_emolumento  $pag_emolumento
     * @return \Illuminate\Http\Response
     */
    public function destroy(pag_emolumento $pag_emolumento)
    {
        //
    }
}
