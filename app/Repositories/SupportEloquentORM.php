<?php

namespace App\Repositories;

use stdClass;

use Ramsey\Uuid\Uuid;
use App\Models\Support;
use Illuminate\Support\Facades\Gate;
use App\DTO\Supports\CreateSupportDTO;
use App\DTO\Supports\UpdateSupportDTO;
use App\Repositories\PaginationPresenter;
use App\Repositories\Contracts\PaginationInterface;
use App\Repositories\Contracts\SupportRepositoryInterface;

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
                    $query->where('subject', $filter);
                    $query->orWhere('body', 'like', "%{$filter}%");
                }
            })
            ->paginate($totalPerPage, ['*'], 'page', $page);

        return new PaginationPresenter($result);
    }

    public function getAll(string $filter = null): array
    {

        return $this->model->with('user')
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
        $support = $this->model->with('user')->find($id);
        if (!$support)
            return null;

        return (object) $support->toArray();
    }
    public function delete(string $id): void
    {
        // only delte the owner of the support
        $support = $this->model->findOrFail($id);
        if (Gate::denies('owner', $support->user->id)) {
            abort(403, 'Nao esta Autorizado');
        }
        // // try to find ,if not fin throw error 404
        // // delete replyes of support
        // $support->replies()->delete();
        //delete support
        $support->delete();
    }
    public function new(CreateSupportDTO $dto): stdClass
    {

        $support = $this->model->create(
            (array) $dto,

        );
        return (object) $support->toArray();
    }
    public function update(UpdateSupportDTO $dto): stdClass|null
    {
        if (!$support = $this->model->find($dto->id))
            return null;
        // If User is not authorized cannot delete the support
        if (Gate::denies('owner', $support->user->id)) {
            abort(403, 'Nao esta Autorizado');
        }
        $support->update((array) $dto);
        return (object) $support->toArray();
    }
}
