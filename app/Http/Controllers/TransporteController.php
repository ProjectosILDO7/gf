<?php

namespace App\Http\Controllers;

use App\Models\Transporte;
use App\Http\Requests\StoreTransporteRequest;
use App\Http\Requests\UpdateTransporteRequest;

class TransporteController extends Controller
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
     * @param  \App\Http\Requests\StoreTransporteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTransporteRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transporte  $transporte
     * @return \Illuminate\Http\Response
     */
    public function show(Transporte $transporte)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transporte  $transporte
     * @return \Illuminate\Http\Response
     */
    public function edit(Transporte $transporte)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTransporteRequest  $request
     * @param  \App\Models\Transporte  $transporte
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTransporteRequest $request, Transporte $transporte)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transporte  $transporte
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transporte $transporte)
    {
        //
    }
}
