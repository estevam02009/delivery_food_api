<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Pega todos os restaurantes do banco de dados
        $restaurants = Restaurant::all();

        // Retorna a Lista de restaurantes como uma resposat json
        return response()->json($restaurant);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. valida os dados de entrada
        $validatedData = $request->validate([
            'name'          =>  'required|string|max:255',
            'address'       =>  'required|string|max:255',
            'phone'         =>  'nullable|string|max:20',
            'description'   =>  'nullable|string',
            'logo_url'      =>  'nullable|url',
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
