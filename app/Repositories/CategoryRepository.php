<?php

namespace App\Repositories;

use App\Category;

class CategoryRepository
{
    /**
     * @var Category
     */
    protected $category;

    /**
     * CategoryRepository constructor.
     *
     * @param Category $category
     */
    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    /**
     * Get all categorys.
     *
     * @return Category $category
     */
    public function getAll()
    {
        return $this->category
            ->get();
    }

    /**
     * Get category by id
     *
     * @param $id
     * @return mixed
     */
    public function getById($id)
    {
        return $this->category
            ->where('id', $id)
            ->get();
    }

    /**
     * Save Category
     *
     * @param $data
     * @return Category
     */
    public function save($data)
    {
        $category = new $this->category;
        $category->name = $data['name'];
        $category->parent_id = $data['parent_id'];
        $category->save();
        return $category->fresh();
    }

    /**
     * Update Category
     *
     * @param $data
     * @return Category
     */
    public function update($data, $id)
    {

        $category = $this->category->find($id);
        $category->name = $data['name'];
        $category->parent_id = $data['parent_id'];
        $category->update();
        return $category;
    }

    /**
     * Update Category
     *
     * @param $data
     * @return Category
     */
    public function delete($id)
    {

        $category = $this->category->find($id);
        $category->delete();
        return $category;
    }

}
