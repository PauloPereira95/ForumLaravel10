<?php

namespace App\Repositories\Eloquent;


use stdClass;
use App\Models\ReplySupport;
use App\DTO\Replies\CreateReplyDTO;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Repositories\Contracts\ReplyRepositoryInterface;


class ReplySupportRepository implements ReplyRepositoryInterface
{
    public function __construct(protected ReplySupport $model){

    }
    public function getAllBySupportId(string $support_id): array
    {
        $replies = $this->model
        ->with(['user' , 'support'])
        ->where('support_id', $support_id)->get();
        return  $replies->toArray();
    }
    public function createNew(CreateReplyDTO $dto): stdClass
    {
       $reply = $this->model->create(
        [
            'content' => $dto->content,
            'support_id' => $dto->support_id,
            'user_id' => Auth::user()->id,

        ]);
        // load the information of relation user
        $reply->load('user');
        // convert to object Model to array and convert to object stdClass
        return (object) $reply->toArray();
    }
    public function delete(string $support_id) : bool {
        if(!$reply = $this->model->find($support_id)){
            return false;
        }
        // only delte the owner of the reply
        if (Gate::denies('owner', $reply->user->id)) {
            abort(403, 'Nao esta Autorizado');
        }
        return $reply->delete();
    }
}
