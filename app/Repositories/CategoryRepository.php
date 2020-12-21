<?php

namespace App\Repositories;

use App\Models\Category;

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
        // return $this->category->get();
        return $this->category->all();
    }

    /**
     * Get category by id
     *
     * @param $id
     * @return mixed
     */
    public function getById($id)
    {
        // return $this->category->where('id', $id)->get();
        return $this->category->find($id);
    }

    /**
     * Save Category
     *
     * @param $data
     * @return Category
     */
    public function save(array $attributes)
    {
        // $category = $this->category;
        // $category->name = $data['name'];
        // $category->parent_id = $data['parent_id'];
        // $category->save();
        // return $category->fresh();
        return $this->category->create($attributes);
    }

    /**
     * Update Category
     *
     * @param $data
     * @return Category
     */
    public function update(array $attributes, $id)
    {
        // $category = $this->category->find($id);
        // $category->name = $data['name'];
        // $category->parent_id = $data['parent_id'];
        // $category->update();
        // return $category;
        return $this->category->find($id)->update($attributes);
    }

    /**
     * Update Category
     *
     * @param $data
     * @return Category
     */
    public function delete($id)
    {
        // $category = $this->category->find($id);
        // $category->delete();
        // return $category;
        return $this->category->find($id)->delete();
    }
}
