<?php
namespace App\Services;

use App\DTO\Replies\CreateReplyDTO;
use stdClass;
use Exception;
use App\DTO\Supports\CreateSupportDTO;
use App\Repositories\Contracts\ReplyRepositoryInterface;
use Illuminate\Support\Facades\Gate;

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
    public function delete(string $support_id ) : bool {

        return  $this->repository->delete($support_id);
    }
}
