<?php

namespace App\Http\Controllers\Api;

use App\Models\Support;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\SupportService;
use App\DTO\Replies\CreateReplyDTO;
use App\Http\Controllers\Controller;
use App\Services\ReplySupportService;
use App\Http\Resources\ReplySupportResource;
use App\Http\Requests\StoreReplySupportRequest;

class ReplySupportApiController extends Controller
{
    public function __construct(
        protected SupportService $supportService,
        protected ReplySupportService $replyService
    ) {
    }
    public function getRepliesFromSupport(string $support_id)
    {
        if (!$this->supportService->findOne($support_id))
            return response()->json(['message' => 'Support not found ! '] , Response::HTTP_NOT_FOUND);

        $replies = $this->replyService->getAllBySupportId($support_id);
        return ReplySupportResource::collection($replies);
    }
    public function createNewReplie(StoreReplySupportRequest $request){
        $reply = $this->replyService->createNew(CreateReplyDTO::makeFromRequest($request));
        // dd($reply);
        return new ReplySupportResource($reply);
    }
}
