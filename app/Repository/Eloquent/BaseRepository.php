<?php

namespace App\Repository\Eloquent;

use App\Models\User;
use App\Repository\Contracts\EloquentRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class BaseRepository implements EloquentRepositoryInterface
{
    protected Model $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function all($columns = ['*']): Collection
    {
        return $this->model->all($columns);
    }

    public function findById(int $id): ?Model
    {

        return $this->model->find($id);
    }

    public function create(array $payload): ?Model
    {
        return $this->model->create($payload);
    }

    public function update(array $payload, int $id): bool
    {
        return $this->findById($id)->update($payload);
    }

    public function deleteById(int $id): ?bool
    {
        return $this->findById($id)->delete();
    }

    public function restoreById(int $id): ?bool
    {
        return $this->findById($id)->restore();
    }

    public function forceDeleteById(int $id): ?bool
    {
        return $this->findById($id)->forceDelete();
    }
}
