<?php

namespace App\Repositories;

use App\Models\Post;
use App\Repositories\PostRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\QueryException;
use Illuminate\Pagination\LengthAwarePaginator;
use Exception;

class PostRepositoryEloquent implements PostRepositoryInterface
{
    public function getAll(): LengthAwarePaginator
    {
        try {
            return Post::withCount('likes')->orderByDesc('publish_date')->paginate(10);
        } catch (QueryException $e) {
            throw new Exception('Could not retrieve posts: ' . $e->getMessage());
        }
    }

    public function getByField(string $name, string $operation, string $value): LengthAwarePaginator
    {
        try {
            return Post::withCount('likes')->where($name, $operation, $value)->orderByDesc('publish_date')->paginate(10);
        } catch (QueryException $e) {
            throw new Exception('Could not retrieve posts: ' . $e->getMessage());
        }
    }

    public function create(array $data): Post
    {
        try {
            return Post::create($data);
        } catch (QueryException $e) {
            throw new Exception('Could not create post: ' . $e->getMessage());
        }
    }

    public function update(int $id, array $data): Post
    {
        try {
            $post = Post::updateOrCreate(['id' => $id], $data);
            return $post;
        } catch (QueryException $e) {
            throw new Exception('Could not update post: ' . $e->getMessage());
        }
    }

    public function delete(Post $post): void
    {
        try {
            $post->delete();
        } catch (QueryException $e) {
            throw new Exception('Could not delete post: ' . $e->getMessage());
        }
    }
}
