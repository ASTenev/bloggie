<?php

namespace App\Repositories;

use App\Models\Post;
use Illuminate\Support\Collection;

interface PostRepositoryInterface
{
    public function getAll(): Collection;

    public function getByField(string $name, string $value): Collection;

    public function create(array $data): Post;

    public function update(Post $post, array $data): Post;

    public function delete(Post $post): void;
}
