<?php
namespace App\Services;
use stdClass;
use Exception;
use App\DTO\Supports\CreateSupportDTO;

class ReplySupportService {
    public function getAllBySupport(string $supportId) : array{
        return [];
    }
    public function createNew(
        CreateSupportDTO $dto
            ) : stdClass{
                throw new Exception('Not Implemented');

    }
}
