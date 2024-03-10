<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Services\SupportService;
use App\DTO\Replies\CreateReplyDTO;
use App\Http\Controllers\Controller;
use App\Services\ReplySupportService;
use App\Http\Requests\StoreReplySupportRequest;

class ReplySupportController extends Controller
{
    public function __construct(
        protected SupportService $supportService,
        protected ReplySupportService $replyService
    ) {
    }
    public function index(string $id)
    {
        if (!$support = $this->supportService->findOne($id)) return back();
        $replies = $this->replyService->getAllBySupportId($id);
        // dd($replies);
        return view(
            'admin/supports/replies/replies',
            compact('support', 'replies')
        );
    }
    public function store(StoreReplySupportRequest $request)
    {
        $this->replyService->createNew(CreateReplyDTO::makeFromRequest($request));
        return redirect()->route('replies.index', $request->support_id)->with('message', 'Comentario Inserido com sucesso !');
    }
    public function destroy(string $support_id, string $reply_id)
    {

        $this->replyService->delete($reply_id);
        return redirect()->route('replies.index', $support_id)->with('message', 'Comentario eliminado com sucesso !');
    }
}
