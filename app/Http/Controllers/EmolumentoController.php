<?php

namespace App\Http\Controllers;

use App\Models\Emolumento;
use App\Http\Requests\StoreEmolumentoRequest;
use App\Http\Requests\UpdateEmolumentoRequest;

class EmolumentoController extends Controller
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
     * @param  \App\Http\Requests\StoreEmolumentoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmolumentoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Emolumento  $emolumento
     * @return \Illuminate\Http\Response
     */
    public function show(Emolumento $emolumento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Emolumento  $emolumento
     * @return \Illuminate\Http\Response
     */
    public function edit(Emolumento $emolumento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEmolumentoRequest  $request
     * @param  \App\Models\Emolumento  $emolumento
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmolumentoRequest $request, Emolumento $emolumento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Emolumento  $emolumento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Emolumento $emolumento)
    {
        //
    }
}
