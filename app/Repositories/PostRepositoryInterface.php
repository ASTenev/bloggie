<?php

namespace App\Repositories;

use App\Models\Post;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

interface PostRepositoryInterface
{
    public function getAll(): LengthAwarePaginator;

    public function getByField(string $name, string $operation, string $value): LengthAwarePaginator;

    public function create(array $data): Post;

    public function update(int $id, array $data): Post;

    public function delete(Post $post): void;
}
