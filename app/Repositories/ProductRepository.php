<?php

namespace App\Repositories;

use App\Product;

class ProductRepository
{
    /**
     * @var Product
     */
    protected $product;
    /**
     * ProductRepository constructor.
     *
     * @param Product $product
     */
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * Get all products.
     *
     * @return Product $product
     */
    public function getAll()
    {
        return $this->product
            ->get();
    }

    /**
     * Get product by id
     *
     * @param $id
     * @return mixed
     */
    public function getById($id)
    {
        return $this->product
            ->where('id', $id)
            ->get();
    }

    /**
     * Save Product
     *
     * @param $data
     * @return Product
     */
    public function save($data)
    {
        $product = $this->product;
        $product->name = $data['name'];
        $product->description = $data['description'];
        $product->price = $data['price'];
        $product->image = $data['image'];
        $product->category_id = $data['category_id'];
        $product->save();
        return $product->fresh();
    }

    /**
     * Update Product
     *
     * @param $data
     * @return Product
     */
    public function update($data, $id)
    {
        $product = $this->product->find($id);
        $product->name = $data['name'];
        $product->description = $data['description'];
        $product->price = $data['price'];
        $product->image = $data['image'];
        $product->category_id = $data['category_id'];
        $product->update();
        return $product;
    }

    /**
     * Update Product
     *
     * @param $data
     * @return Product
     */
    public function delete($id)
    {
        $product = $this->product->find($id);
        $product->delete();
        return $product;
    }
}
