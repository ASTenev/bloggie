<?php

namespace App\Services;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Collection;
use App\Repositories\PostRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class PostService
{
    private $postRepository;

    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function index(): LengthAwarePaginator
    {
        return $this->postRepository->getAll();
    }

    public function userPosts(): LengthAwarePaginator
    {
        return $this->postRepository->getByField('user_id', Auth::id());
    }

    public function show(int $id): ?Post
    {
        return $this->postRepository->getByField('id', $id)->first();
    }

    public function store(array $data): Post
    {
        return $this->postRepository->create($data);
    }

    public function update(Post $post, array $data): Post
    {
        return $this->postRepository->update($post, $data);
    }

    public function destroy(Post $post): void
    {
        $this->postRepository->delete($post);
    }
}
