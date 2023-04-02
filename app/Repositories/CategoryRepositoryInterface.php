<?php

namespace App\Repositories;

use App\Models\Category;

interface CategoryRepositoryInterface
{
    public function getAll();

    public function create(array $data);

    public function update(int $id, array $data);

    public function delete(int $id);

    public function find(int $id): ?Category;
}
