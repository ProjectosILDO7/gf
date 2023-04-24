<?php

namespace App\Http\Controllers;

use App\Models\Pagamentos\pag_multa;
use App\Http\Requests\Storepag_multaRequest;
use App\Http\Requests\Updatepag_multaRequest;

class PagMultaController extends Controller
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
     * @param  \App\Http\Requests\Storepag_multaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storepag_multaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pagamentos\pag_multa  $pag_multa
     * @return \Illuminate\Http\Response
     */
    public function show(pag_multa $pag_multa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pagamentos\pag_multa  $pag_multa
     * @return \Illuminate\Http\Response
     */
    public function edit(pag_multa $pag_multa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatepag_multaRequest  $request
     * @param  \App\Models\Pagamentos\pag_multa  $pag_multa
     * @return \Illuminate\Http\Response
     */
    public function update(Updatepag_multaRequest $request, pag_multa $pag_multa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pagamentos\pag_multa  $pag_multa
     * @return \Illuminate\Http\Response
     */
    public function destroy(pag_multa $pag_multa)
    {
        //
    }
}
