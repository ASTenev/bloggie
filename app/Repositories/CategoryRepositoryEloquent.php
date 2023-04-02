<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepositoryEloquent implements CategoryRepositoryInterface
{
    public function getAll()
    {
        return Category::all();
    }

    public function create(array $data)
    {
        return Category::create($data);
    }

    public function update(int $id, array $data)
    {
        $category = $this->find($id);
        if ($category) {
            $category->update($data);
        }
        return $category;
    }

    public function delete(int $id)
    {
        $category = $this->find($id);
        if ($category) {
            $category->delete();
        }
    }

    public function find(int $id): ?Category
    {
        return Category::find($id);
    }
}
