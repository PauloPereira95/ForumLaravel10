<?php

namespace App\Services;

use stdClass;
use App\DTO\Supports\CreateSupportDTO;
use App\DTO\Supports\UpdateSupportDTO;
use App\Repositories\Contracts\PaginationInterface;
use App\Repositories\Contracts\SupportRepositoryInterface;

class SupportService
{
    public function __construct(protected SupportRepositoryInterface $repository)
    {

    }

    public function new(CreateSupportDTO $dto): stdClass
    {
        return $this->repository->new($dto);
    }

    public function update(UpdateSupportDTO $dto): stdClass|null
    {
        return $this->repository->update($dto);
    }
    public function paginate(
        int $page,
        string $filter = null,
        int $totalPerPage
    ) : PaginationInterface{
        return $this->repository->paginate(
            page: $page,
            totalPerPage: $totalPerPage,
            filter: $filter

        );
    }
    public function getAll(string $filter = null): array
    {
        return $this->repository->getAll($filter);
    }

    public function findOne(string|int $id): stdClass|null
    {
        return $this->repository->findOne($id);
    }

    public function delete(string|int $id): void
    {
        $this->repository->delete($id);
    }
}
