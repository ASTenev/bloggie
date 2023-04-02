<?php

namespace App\Repositories;

use App\Models\Like;

interface LikeRepositoryInterface
{
    public function create(array $data): Like;
    public function find(int $id): ?Like;
    public function findByPostAndUser(int $postId, int $userId): ?Like;
    public function delete(int $id): bool;
    public function countByPost(int $postId): int;
    public function isLiked(int $postId, int $userId): bool;
}
