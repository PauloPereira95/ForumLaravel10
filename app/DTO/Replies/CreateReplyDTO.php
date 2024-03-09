<?php
namespace App\DTO\Replies;
class CreateReplyDTO {

    public function __construct(
        public string $support_id,
        public string $content
    ){

    }
    // create dto object
    public static function makeFromRequest(object $request) : self{
        // dd($request->all());
        return new self(
            $request->support_id,
            $request->content
        );
    }
}
