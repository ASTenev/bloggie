<?php

namespace App\Repositories;

use App\Models\Post;
use App\Repositories\PostRepository;
use Illuminate\Database\Eloquent\Collection;

class PostRepositoryEloquent implements PostRepository
{
    public function getAll(): Collection
    {
        return Post::all();
    }

    public function getUserPosts(): Collection
    {
        return Post::where('user_id', auth()->user()->id)->get();
    }

    public function getById(int $id): ?Post
    {
        return Post::find($id);
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
