<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Services\SupportService;
use App\Http\Controllers\Controller;
use App\Services\ReplySupportService;

class ReplySupportController extends Controller
{
    public function __construct(
        protected SupportService $supportService,
        protected ReplySupportService $replyService){

    }
    public function index(string $id) {
        if (!$support = $this->supportService->findOne($id)) return back();
        $replies = $this->replyService->getAllBySupportId($id);
        dd($replies);
        return view('admin/supports/replies/replies', compact('support' , 'replies'));
    }
}
