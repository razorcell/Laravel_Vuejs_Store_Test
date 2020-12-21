<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * @var productService
     */
    protected $productService;

    /**
     * ProductController Constructor
     *
     * @param ProductService $productService
     *
     */
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): Object
    {
        //     $result = ['status' => 200];
        //     try {
        //         $result['data'] = $this->productService->getAll();
        //     } catch (Exception $e) {
        //         $result = [
        //             'status' => 500,
        //             'error' => $e->getMessage(),
        //         ];
        //     }
        //     return response()->json($result, $result['status']);
        $products = $this->productService->getAll();
        return response()->json($products);
    }

    /**
     * Display the specified resource.
     *
     * @param  id
     * @return \Illuminate\Http\Response
     */
    public function show($id): Object
    {
        // $result = ['status' => 200];
        // try {
        //     $result['data'] = $this->productService->getById($id);
        // } catch (Exception $e) {
        //     $result = [
        //         'status' => 500,
        //         'error' => $e->getMessage(),
        //     ];
        // }
        // return response()->json($result, $result['status']);
        return $this->productService->getById($id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request): Object
    {
        // $data = [];
        // $data['name'] = $request->name;
        // $data['description'] = $request->description;
        // $data['price'] = $request->price;
        // $data['image'] = $request->image;
        // $data['category_id'] = $request->category_id;
        // $result = ['status' => 200];
        // try {
        //     $result['data'] = $this->productService->saveProductData($data);
        // } catch (Exception $e) {
        //     $result = [
        //         'status' => 500,
        //         'error' => $e->getMessage(),
        //     ];
        // }
        // return response()->json($result, $result['status']);
        $this->productService->saveProductData($request);
        return response()->json(['status' => 'Product created successfully']);
    }

    /**
     * Update product.
     *
     * @param Request $request
     * @param id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id): Object
    {
        // $data = [];
        // $data['name'] = $request->name;
        // $data['description'] = $request->description;
        // $data['price'] = $request->price;
        // $data['image'] = $request->image;
        // $data['category_id'] = $request->category_id;
        // $result = ['status' => 200];
        // try {
        //     $result['data'] = $this->productService->updateProduct($data, $id);
        // } catch (Exception $e) {
        //     $result = [
        //         'status' => 500,
        //         'error' => $e->getMessage(),
        //     ];
        // }
        // return response()->json($result, $result['status']);
        $this->productService->updateProduct($request, $id);
        return response()->json(['status' => 'Product updated successfully']);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id): Object
    {
        // $result = ['status' => 200];
        // try {
        //     $result['data'] = $this->productService->deleteById($id);
        // } catch (Exception $e) {
        //     $result = [
        //         'status' => 500,
        //         'error' => $e->getMessage(),
        //     ];
        // }
        // return response()->json($result, $result['status']);
        $this->productService->deleteById($id);
        return response()->json(['status' => 'Product Deleted successfully']);
    }
}
