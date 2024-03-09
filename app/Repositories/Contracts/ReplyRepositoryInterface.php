<?php
namespace App\Repositories\Contracts;

use App\DTO\Supports\CreateSupportDTO;

interface ReplyRepositoryInterface
{
    public function getAllBySupportId(string $supportId): array;
    public function createNew(CreateSupportDTO $dto):stdClass;
}
