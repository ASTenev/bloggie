<?php

namespace App\Services;

use App\Models\Post;
use App\Repositories\PostRepository;
use Illuminate\Database\Eloquent\Collection;

class PostService
{
    private $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function index(): Collection
    {
        return $this->postRepository->getAll();
    }

    public function userPosts(): Collection
    {
        return $this->postRepository->getUserPosts();
    }

    public function show(int $id): ?Post
    {
        return $this->postRepository->getById($id);
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
