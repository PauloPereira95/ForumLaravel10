<?php
namespace App\DTO\Replies;

use App\Http\Requests\StoreReplySupportRequest;

class CreateReplyDTO {

    public function __construct(
        public string $support_id,
        public string $content
    ){

    }
    // create dto object
    public static function makeFromRequest(StoreReplySupportRequest $request) : self{
        // dd($request->all());
        return new self(
            $request->support_id,
            $request->content
        );
    }
}
