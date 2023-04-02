<?php

namespace App\Repositories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;
use App\Repositories\PostRepositoryInterface;

class PostRepositoryEloquent implements PostRepositoryInterface
{
    public function getAll(): Collection
    {
        return Post::orderByDesc('publish_date')->get();
    }

    public function getByField(string $name, string $value): Collection
    {
        return Post::where($name, '=', $value)->get();
    }

    public function create(array $data): Post
    {
        return Post::create($data);
    }

    public function update(Post $post, array $data): Post
    {
        $post->update($data);
        return $post;
    }

    public function delete(Post $post): void
    {
        $post->delete();
    }
}
