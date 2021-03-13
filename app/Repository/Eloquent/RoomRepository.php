<?php

namespace App\Repository\Eloquent;

use App\Models\Room;
use App\Repository\Contracts\RoomRepositoryInterface;

class RoomRepository extends BaseRepository implements RoomRepositoryInterface
{
    protected Room $model;

    public function __construct(Room $model)
    {
        $this->model = $model;
    }
}
