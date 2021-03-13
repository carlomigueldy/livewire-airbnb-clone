<?php

namespace app\Repository\Eloquent;

use App\Models\Room;
use app\Repository\Contracts\RoomRepositoryInterface;

class RoomRepository extends BaseRepository implements RoomRepositoryInterface
{
    protected Room $model;

    public function __construct(Room $model)
    {
        $this->model = $model;
    }
}
