<?php

namespace App\Repositories\Eloquent;


use App\Models\ReplySupport;
use stdClass;
use App\DTO\Replies\CreateReplyDTO;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Contracts\ReplyRepositoryInterface;


class ReplySupportRepository implements ReplyRepositoryInterface
{
    public function __construct(protected ReplySupport $model){

    }
    public function getAllBySupportId(string $supportId): array
    {
        $replies = $this->model->where('support_id', $supportId)->get();
        return  $replies->toArray();
    }
    public function createNew(CreateReplyDTO $dto): stdClass
    {
       $reply = $this->model->create(
        [
            'content' => $dto->content,
            'support_id' => $dto->supportId,
            'user_id' => Auth::user()->id,

        ]);
        // convert to object
        return (object) $reply;
    }
}
