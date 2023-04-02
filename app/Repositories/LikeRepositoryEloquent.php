<?php

namespace App\Repositories;

use App\Models\Like;
use App\Repositories\LikeRepositoryInterface;

class LikeRepositoryEloquent implements LikeRepositoryInterface
{
    protected $model;

    public function __construct(Like $like)
    {
        $this->model = $like;
    }

    public function create(array $data): Like
    {
        return $this->model->create($data);
    }

    public function find(int $id): ?Like
    {
        return $this->model->find($id);
    }

    public function findByPostAndUser(int $postId, int $userId): ?Like
    {
        return $this->model->where('post_id', $postId)
                            ->where('user_id', $userId)
                            ->first();
    }

    public function delete(int $id): bool
    {
        return $this->model->destroy($id);
    }

    public function countByPost(int $postId): int
    {
        return $this->model->where('post_id', $postId)->count();
    }

    public function isLiked(int $postId, int $userId): bool
    {
        return $this->model->where('post_id', $postId)
                            ->where('user_id', $userId)
                            ->exists();
    }
}
