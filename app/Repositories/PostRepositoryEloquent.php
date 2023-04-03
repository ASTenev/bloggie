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
        return Post::withCount('likes')->orderByDesc('publish_date')->paginate(10);
        
    }

    public function getByField(string $name, string $operation, string $value): LengthAwarePaginator
    {
        return Post::withCount('likes')->where($name, $operation, $value)->orderByDesc('publish_date')->paginate(10);
    }

    public function create(array $data): Post
    {
        return Post::create($data);
    }

    public function update(int $id, array $data): Post
    {
        $post = Post::updateOrCreate(['id' => $id], $data);
        return $post;
    }

    public function delete(Post $post): void
    {
        $post->delete();
    }
}

