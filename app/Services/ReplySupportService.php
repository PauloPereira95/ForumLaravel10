<?php
namespace App\Services;

use stdClass;
use Exception;
use App\Events\SupportReplied;
use App\DTO\Replies\CreateReplyDTO;
use Illuminate\Support\Facades\Gate;
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
                $reply =   $this->repository->createNew($dto);

        // send email when create a new comment (Reply)
        SupportReplied::dispatch($reply);
        return $reply;

    }
    public function delete(string $support_id ) : bool {

        return  $this->repository->delete($support_id);
    }
}
