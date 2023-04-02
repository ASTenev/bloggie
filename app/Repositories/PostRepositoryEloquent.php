<?php

namespace App\Repositories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;
use App\Repositories\PostRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class PostRepositoryEloquent implements PostRepositoryInterface
{
    public function getAll(): LengthAwarePaginator
    {
        return Post::orderByDesc('publish_date')->paginate(10);
    }

    public function getByField(string $name, string $value): LengthAwarePaginator
    {
        return Post::where($name, '=', $value)->paginate(10);
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
