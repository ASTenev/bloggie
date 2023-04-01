<?php

namespace App\Repositories;

use App\Models\Post;
use Illuminate\Support\Collection;

interface PostRepository
{
    public function getAll(): Collection;

    public function getUserPosts(): Collection;

    public function getById(int $id): ?Post;

    public function create(array $data): Post;

    public function update(Post $post, array $data): Post;

    public function delete(Post $post): void;
}
