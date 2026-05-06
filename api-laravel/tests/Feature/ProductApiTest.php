<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ProductApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_categories_endpoint_returns_mercado_livre_categories(): void
    {
        $categories = [
            ['id' => 'MLB1', 'name' => 'Categoria 1'],
            ['id' => 'MLB2', 'name' => 'Categoria 2'],
        ];

        Http::fake([
            'https://api.mercadolibre.com/sites/MLB/categories' => Http::response($categories),
        ]);

        $response = $this->getJson('/api/categories');

        $response->assertOk()->assertExactJson($categories);
    }

    public function test_product_can_be_created_with_expected_fields(): void
    {
        Storage::fake('public');

        $image = UploadedFile::fake()->createWithContent(
            'product.png',
            base64_decode('iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mP8/x8AAwMCAO+jfZ0AAAAASUVORK5CYII=')
        );

        $response = $this->post('/api/products', [
            'name' => 'Notebook Gamer',
            'description' => 'Produto para teste',
            'price' => 4999.99,
            'stock' => 7,
            'category_id' => 'MLB1648',
            'image' => $image,
        ], [
            'Accept' => 'application/json',
        ]);

        $response->assertCreated()
            ->assertJsonPath('product.name', 'Notebook Gamer')
            ->assertJsonPath('product.stock', 7)
            ->assertJsonPath('product.category_id', 'MLB1648');

        $this->assertDatabaseHas('products', [
            'name' => 'Notebook Gamer',
            'stock' => 7,
            'category_id' => 'MLB1648',
        ]);

        $imagePath = $response->json('product.image_path');

        Storage::disk('public')->assertExists($imagePath);
    }
}
