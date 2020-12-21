<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * @var categoryService
     */
    protected $categoryService;

    /**
     * CategoryController Constructor
     *
     * @param CategoryService $categoryService
     *
     */
    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): Object
    {
        // $result = ['status' => 200];
        // try {
        //     $result['data'] = $this->categoryService->getAll();
        // } catch (Exception $e) {
        //     $result = [
        //         'status' => 500,
        //         'error' => $e->getMessage(),
        //     ];
        // }
        // return response()->json($result, $result['status']);
        $categories = $this->categoryService->getAll();
        return response()->json($categories);
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
        //     $result['data'] = $this->categoryService->getById($id);
        // } catch (Exception $e) {
        //     $result = [
        //         'status' => 500,
        //         'error' => $e->getMessage(),
        //     ];
        // }
        // return response()->json($result, $result['status']);
        return $this->categoryService->getById($id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request): Object
    {
        // $data = [];
        // $data['name'] = $request->name;
        // $data['parent_id'] = isset($request->parent_id) ? $request->parent_id : null;
        // $result = ['status' => 200];
        // try {
        //     $result['data'] = $this->categoryService->saveCategoryData($data);
        // } catch (Exception $e) {
        //     $result = [
        //         'status' => 500,
        //         'error' => $e->getMessage(),
        //     ];
        // }
        // return response()->json($result, $result['status']);
        $this->categoryService->saveCategoryData($request);
        return response()->json(['status' => 'Category created successfully']);
    }

    /**
     * Update category.
     *
     * @param Request $request
     * @param id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id): Object
    {
        // $data = [];
        // $data['name'] = $request->name;
        // $data['parent_id'] = isset($request->parent_id) ? $request->parent_id : null;
        // $result = ['status' => 200];
        // try {
        //     $result['data'] = $this->categoryService->updateCategory($data, $id);
        // } catch (Exception $e) {
        //     $result = [
        //         'status' => 500,
        //         'error' => $e->getMessage(),
        //     ];
        // }
        // return response()->json($result, $result['status']);
        $this->categoryService->updateCategory($request, $id);
        return response()->json(['status' => 'Category updated successfully']);
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
        //     $result['data'] = $this->categoryService->deleteById($id);
        // } catch (Exception $e) {
        //     $result = [
        //         'status' => 500,
        //         'error' => $e->getMessage(),
        //     ];
        // }
        // return response()->json($result, $result['status']);
        $this->categoryService->deleteById($id);
        return response()->json(['status' => 'Category Deleted successfully']);
    }
}
