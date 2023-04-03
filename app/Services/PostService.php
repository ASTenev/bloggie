<?php

namespace App\Services;

use App\Models\Like;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Collection;
use App\Repositories\LikeRepositoryInterface;
use App\Repositories\PostRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Repositories\CategoryRepositoryInterface;

class PostService
{
    private $postRepository;
    private $categoryRepository;
    private $likeRepository;

    public function __construct(PostRepositoryInterface $postRepository, CategoryRepositoryInterface $categoryRepository, LikeRepositoryInterface $likeRepository)
    {
        $this->postRepository = $postRepository;
        $this->categoryRepository = $categoryRepository;
        $this->likeRepository = $likeRepository;
    }

    public function index(): LengthAwarePaginator
    {
        $posts = $this->postRepository->getAll();
        return $this->addIsLiked($posts);
    }

    public function search(string $search): LengthAwarePaginator
    {
        $posts = $this->postRepository->getByField('title', 'LIKE', "%$search%");
        return $this->addIsLiked($posts);
    }

    public function getByUser(): LengthAwarePaginator
    {
        $posts = $this->postRepository->getByField('user_id', '=', Auth::id());
        return $this->addIsLiked($posts);
    }

     public function getByCategory(int $id): LengthAwarePaginator
    {
        $posts = $this->postRepository->getByField('category_id', '=', $id);
        return $this->addIsLiked($posts);
    }

    public function show(int $id): ?Post
    {
        $posts = $this->postRepository->getByField('id', '=', $id);
        return $this->addIsLiked($posts)->first();
    }

    public function store(array $data): Post
    {
        return $this->postRepository->create($data);
    }

    public function update(int $id, array $data): Post
    {
        return $this->postRepository->update($id, $data);
    }

    public function destroy(Post $post): void
    {
        $this->postRepository->delete($post);
    }

    public function getCategories(): Collection
    {
        return $this->categoryRepository->getAll();
    }

    public function like(Post $post): Like
    {
        return $this->likeRepository->create([
            'post_id' => $post->id,
            'user_id' => Auth::id()
        ]);
    }

    public function unlike(Post $post): void
    {
        $like = $this->likeRepository->findByPostAndUser($post->id, Auth::id());
        $this->likeRepository->delete($like->id);
    }

    public function getLikesCount(int $id): int
    {
        return $this->likeRepository->countByPost($id);
    }

    public function isLiked(int $id): bool
    {
        return $this->likeRepository->isLiked($id, Auth::id());
    }

    public function addIsLiked($posts)
    {
        foreach ($posts as &$post) {
            if(Auth::check())
                $post['is_liked'] = $this->isLiked($post->id);
        }
        return $posts;
    }
}
