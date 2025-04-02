<?php

namespace App\Http\Controllers;

use App\Models\NEM;
use Illuminate\Http\Request;

class NEMController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('nueva-escuela');
    }

    public function show_nem()
    {
        return view('reconocimiento_nem');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(NEM $nEM)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(NEM $nEM)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, NEM $nEM)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NEM $nEM)
    {
        //
    }
}
