<?php

namespace App\Services;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Collection;
use App\Repositories\PostRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Repositories\CategoryRepositoryInterface;

class PostService
{
    private $postRepository;
    private $categoryRepository;

    public function __construct(PostRepositoryInterface $postRepository, CategoryRepositoryInterface $categoryRepository)
    {
        $this->postRepository = $postRepository;
        $this->categoryRepository = $categoryRepository;
    }

    public function index(): LengthAwarePaginator
    {
        return $this->postRepository->getAll();
    }

    public function search(string $search): LengthAwarePaginator
    {
        return $this->postRepository->getByField('title', 'LIKE', "%$search%");
    }

    public function getByUser(): LengthAwarePaginator
    {
        return $this->postRepository->getByField('user_id', '=', Auth::id());
    }

    public function show(int $id): ?Post
    {
        return $this->postRepository->getByField('id', '=', $id)->first();
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

    public function getByCategory(int $id): LengthAwarePaginator
    {
        return $this->postRepository->getByField('category_id', '=', $id);
    }

    public function getCategories(): Collection
    {
        return $this->categoryRepository->getAll();
    }
}
