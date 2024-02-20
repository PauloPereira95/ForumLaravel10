<?php
namespace App\Dto;
use App\Http\Requests\StoreUpdateSupport;
class CreateSupportDTO {

    public function __construct(
        public string $subject,
        public string $status,
        public string $body
    ) {}
    // retorna um objecto da propria classe
    public static function makeFromRequest(StoreUpdateSupport $request):self{
        return new self(
            $request->subject,
            'a',
            $request->body,

        );
    }

}