<?php

namespace App\Repositories;

use App\Models\Product;

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
        // return $this->product->get();
        return $this->product->all();
    }

    /**
     * Get product by id
     *
     * @param $id
     * @return mixed
     */
    public function getById($id)
    {
        // return $this->product->where('id', $id)->get();
        return $this->product->find($id);
    }

    /**
     * Save Product
     *
     * @param $data
     * @return Product
     */
    public function save(array $attributes)
    {
        // $product = $this->product;
        // $product->name = $data['name'];
        // $product->description = $data['description'];
        // $product->price = $data['price'];
        // $product->image = $data['image'];
        // $product->category_id = $data['category_id'];
        // $product->save();
        // return $product->fresh();
        return $this->product->create($attributes);
    }

    /**
     * Update Product
     *
     * @param $data
     * @return Product
     */
    public function update(array $attributes, $id)
    {
        // $product = $this->product->find($id);
        // $product->name = $data['name'];
        // $product->description = $data['description'];
        // $product->price = $data['price'];
        // $product->image = $data['image'];
        // $product->category_id = $data['category_id'];
        // $product->update();
        // return $product;
        return $this->product->find($id)->update($attributes);
    }

    /**
     * Update Product
     *
     * @param $data
     * @return Product
     */
    public function delete($id)
    {
        // $product = $this->product->find($id);
        // $product->delete();
        // return $product;
        return $this->product->find($id)->delete();
    }
}
