<?php

namespace App\Services;

use App\Repositories\ProductRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

class ProductService
{
    /**
     * @var $productRepository
     */
    protected $productRepository;

    /**
     * ProductService constructor.
     *
     * @param ProductRepository $productRepository
     */
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * Delete product by id.
     *
     * @param $id
     * @return String
     */
    public function deleteById($id)
    {
        DB::beginTransaction();
        try {
            $product = $this->productRepository->delete($id);
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());
            throw new InvalidArgumentException('Unable to delete product data');
        }
        DB::commit();
        return $product;
    }

    /**
     * Get all product.
     *
     * @return String
     */
    public function getAll()
    {
        return $this->productRepository->getAll();
    }

    /**
     * Get product by id.
     *
     * @param $id
     * @return String
     */
    public function getById($id)
    {
        return $this->productRepository->getById($id);
    }

    /**
     * Update product data
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function updateProduct($data, $id)
    {
        $validator = Validator::make($data, [
            'name' => 'required|min:2',
            'description' => 'required|min:3',
            'price' => 'required|min:1',
            'image' => 'required|min:2',
            'category_id' => 'nullable',
        ]);
        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }
        DB::beginTransaction();
        try {
            $product = $this->productRepository->update($data, $id);

        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());
            throw new InvalidArgumentException('Unable to update product data');
        }
        DB::commit();
        return $product;

    }

    /**
     * Validate product data.
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function saveProductData($data)
    {
        $validator = Validator::make($data, [
            'name' => 'required|min:2',
            'description' => 'required|min:3',
            'price' => 'required|min:1',
            'image' => 'required|min:2',
            'category_id' => 'nullable',
        ]);
        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }
        $result = $this->productRepository->save($data);
        return $result;
    }
}
