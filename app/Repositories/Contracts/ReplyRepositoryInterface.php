<?php
namespace App\Repositories\Contracts;

use stdClass;
use App\DTO\Replies\CreateReplyDTO;
use App\DTO\Supports\CreateSupportDTO;

interface ReplyRepositoryInterface
{
    public function getAllBySupportId(string $supportId): array;
    public function createNew(CreateReplyDTO $dto):stdClass;
}
