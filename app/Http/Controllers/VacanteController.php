<?php

namespace App\Http\Controllers;

use App\Models\Vacante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class VacanteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // Usando policy
        /* if (!Gate::allows('viewAny', Vacante::class)) {
            dd("soy developer");
            abort(403);
        } */
        /* dd("soy reclutador"); */
        return view('vacantes.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Usando policy
        if (!Gate::allows('create', Vacante::class)) {
            /* dd('asdad'); */
            abort(403);
        }

        return view('vacantes.create');
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
    public function show(Vacante $vacante)
    {
        return view('vacantes.show', compact('vacante'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vacante $vacante)
    {
        // Usando policy
        if (!Gate::allows('update', $vacante)) {
            abort(403);
        }

        return view('vacantes.edit', compact('vacante'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}