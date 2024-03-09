<?php
namespace App\Services;

use App\DTO\Replies\CreateReplyDTO;
use stdClass;
use Exception;
use App\DTO\Supports\CreateSupportDTO;
use App\Repositories\Contracts\ReplyRepositoryInterface;

class ReplySupportService {
    public function __construct(protected ReplyRepositoryInterface $repository){

    }
    public function getAllBySupportId(string $supportId) : array{
        return $this->repository->getAllBySupportId($supportId);
    }
    public function createNew(
        CreateReplyDTO $dto
            ) : stdClass{
        $reply =  $this->repository->createNew($dto);
        return $reply;

    }
}
