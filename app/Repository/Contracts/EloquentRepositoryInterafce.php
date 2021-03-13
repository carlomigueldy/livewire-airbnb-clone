<?php

namespace app\Repository\Contracts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface EloquentRepositoryInterface
{
    /** @return Collection  */
    public function all($columns = ['*']): Collection;

    /**
     * @param int $id
     * @return null|Model
     */
    public function findById(int $id): ?Model;

    /**
     * @param array $payload
     * @return null|Model
     */
    public function create(array $payload): ?Model;

    /**
     * @param array $payload
     * @param int $id
     * @return bool
     */
    public function update(array $payload, int $id): bool;

    /**
     * @param int $id
     * @return null|bool
     */
    public function deleteById(int $id): ?bool;

    /**
     * @param int $id
     * @return null|bool
     */
    public function restoreById(int $id): ?bool;

    /**
     * @param int $id
     * @return null|bool
     */
    public function forceDeleteById(int $id): ?bool;
}
