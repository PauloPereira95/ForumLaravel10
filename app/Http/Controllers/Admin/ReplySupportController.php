<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Services\SupportService;
use App\Http\Controllers\Controller;

class ReplySupportController extends Controller
{
    public function __construct(protected SupportService $service){

    }
    public function index(string $id) {
        if (!$support = $this->service->findOne($id)) return back();

        return view('admin/supports/replies/replies', compact('support'));
    }
}
