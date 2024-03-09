<?php
namespace App\Repositories\Contracts;

interface ReplyRepositoryInterface
{
    public function getAllBySupport(string $supportId): array;
    public function createNew(CreateSupportDTO $dto):stdClass;
}
