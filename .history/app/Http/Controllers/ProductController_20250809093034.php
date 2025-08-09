<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // 1. Busca todos os produtos
        $products = Product::with('restaurant')->get();

        // 2. Retorna os produtos como uma resposta JSON
        return response()->json($products);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. Valida os dados de entrada
        $validatedData = $request->validate([
            'restaurant_id'     => 'required|exists:restaurants,id',
            'name'              => 'required|string|max:255',
            'description'       => 'required|string|max:255',
            'price'             => 'required|numeric',
            'image_url'         =>  'nullable|url',
            'is_available'      =>  'boolean',
        ]);

        // 2. Cria um novo produto
        $product = Product::create($validatedData);

        // 3. Retorna o produto criado
        return response()->json($product, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
