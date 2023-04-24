<?php

namespace App\Http\Controllers;

use App\Models\Pagamentos\pag_tcc;
use App\Http\Requests\Storepag_tccRequest;
use App\Http\Requests\Updatepag_tccRequest;

class PagTccController extends Controller
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
     * @param  \App\Http\Requests\Storepag_tccRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storepag_tccRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pagamentos\pag_tcc  $pag_tcc
     * @return \Illuminate\Http\Response
     */
    public function show(pag_tcc $pag_tcc)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pagamentos\pag_tcc  $pag_tcc
     * @return \Illuminate\Http\Response
     */
    public function edit(pag_tcc $pag_tcc)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatepag_tccRequest  $request
     * @param  \App\Models\Pagamentos\pag_tcc  $pag_tcc
     * @return \Illuminate\Http\Response
     */
    public function update(Updatepag_tccRequest $request, pag_tcc $pag_tcc)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pagamentos\pag_tcc  $pag_tcc
     * @return \Illuminate\Http\Response
     */
    public function destroy(pag_tcc $pag_tcc)
    {
        //
    }
}
