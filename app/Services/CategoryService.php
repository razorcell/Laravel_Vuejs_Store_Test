<?php

namespace App\Services;

use App\Repositories\CategoryRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

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
     * Delete category by id.
     *
     * @param $id
     * @return String
     */
    public function deleteById($id)
    {
        DB::beginTransaction();
        try {
            $category = $this->categoryRepository->delete($id);
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());
            throw new InvalidArgumentException('Unable to delete category data');
        }
        DB::commit();
        return $category;
    }

    /**
     * Get all category.
     *
     * @return String
     */
    public function getAll()
    {
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
     * Update category data
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function updateCategory($data, $id)
    {
        $validator = Validator::make($data, [
            'name' => 'required|min:2',
            'parent_id' => 'nullable',
        ]);
        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }
        DB::beginTransaction();
        try {
            $category = $this->categoryRepository->update($data, $id);

        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());
            throw new InvalidArgumentException('Unable to update category data');
        }
        DB::commit();
        return $category;

    }

    /**
     * Validate category data.
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function saveCategoryData($data)
    {
        $validator = Validator::make($data, [
            'name' => 'required|min:2',
            'parent_id' => 'nullable',
        ]);
        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }
        $result = $this->categoryRepository->save($data);
        return $result;
    }
}
