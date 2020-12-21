<?php

namespace App\Services;

use App\Models\Category;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryService
{
    /**
     * @var $categoryRepository
     */
    protected $categoryRepository;

    /**
     * CategoryService constructor.
     *
     * @param CategoryRepository $categoryRepository
     */
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }
    /**
     * Get all category.
     *
     * @return String
     */
    public function getAll()
    {
        // return $this->categoryRepository->getAll();
        return $this->categoryRepository->getAll();
    }

    /**
     * Get category by id.
     *
     * @param $id
     * @return String
     */
    public function getById($id)
    {
        return $this->categoryRepository->getById($id);
    }

    /**
     * Validate category data.
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    // public function saveCategoryData($data)
    public function saveCategoryData(Request $request)
    {
        // $validator = Validator::make($data, [
        //     'name' => 'required|min:2',
        //     'parent_id' => 'nullable',
        // ]);
        // if ($validator->fails()) {
        //     throw new InvalidArgumentException($validator->errors()->first());
        // }
        // $result = $this->categoryRepository->save($data);
        // return $result;
        $attributes = $request->all();
        return $this->categoryRepository->save($attributes);
    }

    /**
     * Update category data
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    // public function updateCategory($data, $id)
    public function updateCategory(Request $request, $id)
    {
        // $validator = Validator::make($data, [
        //     'name' => 'required|min:2',
        //     'parent_id' => 'nullable',
        // ]);
        // if ($validator->fails()) {
        //     throw new InvalidArgumentException($validator->errors()->first());
        // }
        // DB::beginTransaction();
        // try {
        //     $category = $this->categoryRepository->update($data, $id);
        // } catch (Exception $e) {
        //     DB::rollBack();
        //     Log::info($e->getMessage());
        //     throw new InvalidArgumentException('Unable to update category data');
        // }
        // DB::commit();
        // return $category;
        $attributes = $request->all();
        return $this->categoryRepository->update($attributes, $id);
    }
    /**
     * Delete category by id.
     *
     * @param $id
     * @return String
     */
    public function deleteById($id)
    {
        // DB::beginTransaction();
        // try {
        //     $category = $this->categoryRepository->delete($id);
        // } catch (Exception $e) {
        //     DB::rollBack();
        //     Log::info($e->getMessage());
        //     throw new InvalidArgumentException('Unable to delete category data');
        // }
        // DB::commit();
        // return $category;
        return $this->categoryRepository->delete($id);
    }
}
