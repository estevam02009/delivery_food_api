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
        return response()->json($restaurants);
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

        // 2. Cria o novo restaurante
        $restaurant = Restaurant::create($validatedData);

        // 3. retorna a resposta com o novo resturante e o status 201 (Created)
        return response()->json($restaurant, 201);
    }

    /**
     * Show the specified resource.
     */
    public function show(string $id)
    {
        // 1. Busca o restaurante pelo ID
        $restaurant = Restaurant::findOrFail($id);

        // 2. Retorna o restaurante como uma resposta JSON
        return response()->json($restaurant);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // 1. Valida os dados de entrada
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'description' => 'nullable|string',
            'logo_url' => 'nullable|url',
        ]);

        // 2. Encontra o restaurante pelo ID
        $restaurant = Restaurant::findOrFail($id);

        // 3. Atualiza o restaurante com os novos dados
        $restaurant->update($validatedData);

        // 4. Retorna o restaurante atualizado
        return response()->json($restaurant);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // 1. Busca o restaurante pelo ID
        $restaurant = Restaurant::findOrFail($id);

        // 2. Remove o restaurante
        $restaurant->delete();

        // 3. Retorna uma resposta JSON vazia com o status 204 (No Content)
        return response()->json(null, 204);
    }
}
