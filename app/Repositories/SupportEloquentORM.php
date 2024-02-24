<?php
namespace App\Repositories;

use App\Models\Support;
use App\DTO\CreateSupportDTO;
use App\DTO\UpdateSupportDTO;
use App\Repositories\SupportRepositoryInterface;
use stdClass;

class SupportEloquentORM implements SupportRepositoryInterface
{
    public function __construct(
        protected Support $model
    ) {

    }
    public function paginate(int $page = 1, int $totalPerPage = 15, string $filter = null): PaginationInterface
    {
        $result = $this->model
            ->where(function ($query) use ($filter) {
                if ($filter) {
                    // filter on subject an body
                    $query->where('subject', $filter);
                    // filter exists anywhere on value body filed
                    $query->orWhere('body', '%like%', "%$filter%");
                }
            })
            // Custom Paginate
            // columns / page
            ->paginate($totalPerPage, ['*'], 'page', $page);
        dd($result->toArray());
    }

    public function getAll(string $filter = null): array
    {

        return $this->model
            ->where(function ($query) use ($filter) {
                if ($filter) {
                    // filter on subject an body
                    $query->where('subject', $filter);
                    // filter exists anywhere on value body filed
                    $query->orWhere('body', '%like%', "%$filter%");
                }
            })
            ->get()
            ->toArray();
    }
    public function findOne(string|int $id): stdClass|null
    {
        $support = $this->model->find($id);
        if (!$support)
            return null;

        return (object) $support->toArray();
    }
    public function delete(string $id): void
    {
        // try to find ,if not fin throw error 404
        $this->model->findOrFail($id)->delete();
    }
    public function new(CreateSupportDTO $dto): stdClass
    {

        $support = $this->model->create(
            (array) $dto
        );
        return (object) $support->toArray();
    }
    public function update(UpdateSupportDTO $dto): stdClass|null
    {
        if (!$support = $this->model->find($dto->id))
            return null;

        $support->update((array) $dto);
        return (object) $support->toArray();
    }
}
