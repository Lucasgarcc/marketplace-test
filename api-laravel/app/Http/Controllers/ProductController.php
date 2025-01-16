<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    //Método para buscar categorias do Mercado livre
    public function getCategories()
     {   
        $response = Http::get('https://api.mercadolibre.com/sites/MLB/categories');

        return response() -> 
        json($response -> json());
    }

    // Método para adicionar um produto

    /* validation */
    
    public function store (Request $request) {

        $validated = $request -> validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'sock' => 'required|integer|min:0',
            'category_id' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Upload da imagem
        $image = $request -> file('image') -> store('products', 'public');

        // Criar o produto
        $product = Product::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'price' => $validated['price'],
            'stock' => $validated['category_id'],
            'image_path' => $image,
        ]);

        return response( ) -> json(['message' => 'Produto criado com Sucesso!', 'product' => $product], 201); 
    }
}
