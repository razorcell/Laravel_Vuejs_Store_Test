<?php

namespace Tests\Feature\Feature;

use App\Product;
use Tests\TestCase;

class ProductsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testsProductsAreCreatedCorrectly()
    {
        $payload = [
            'name' => 'Test product',
            'description' => 'Test description',
            'price' => 20,
            'image' => 'Test image',
            'category_id' => 0,
        ];
        $this->post('/api/products', $payload)->assertStatus(201);
    }
    public function testsProductsAreUpdatedCorrectly()
    {
        $product = factory(Product::class)->create([
            'name' => 'Test product',
            'description' => 'Test description',
            'price' => 20,
            'image' => 'Test image',
            'category_id' => 0,
        ]);
        $payload = [
            'name' => 'Test New product',
            'description' => 'Test New description',
            'price' => 30,
            'image' => 'Test New image',
            'category_id' => 0,
        ];
        $this->put('/api/products/' . $product->id, $payload)->assertStatus(200);

    }
}
