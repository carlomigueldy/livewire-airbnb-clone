<?php

namespace App\Repository\Eloquent;

use App\Models\Reservation;
use App\Models\Review;
use App\Repository\Contracts\ReservationRepositoryInterface;
use Illuminate\Contracts\Container\BindingResolutionException;

class ReservationRepository extends BaseRepository implements ReservationRepositoryInterface
{
    protected Reservation $model;

    public function __construct(Reservation $model)
    {
        $this->model = $model;
    }

    /**
     * @param array $payload
     * @return null|Reservation
     * @throws BindingResolutionException
     */
    public function createReservation(array $payload): ?Reservation
    {
        $payload['user_id'] = auth()->id();

        return $this->model->create($payload);
    }

    /**
     * @param int $reservationId
     * @param array $payload
     * @return null|Review
     */
    public function createReviewForReservation(int $reservationId, array $payload): ?Review
    {
        return $this->model->findById($reservationId)->review()->create($payload);
    }

    /**
     * @param int $reservationId
     * @return null|bool
     */
    public function deleteReviewForReservation(int $reservationId): ?bool
    {
        return $this->model->findById($reservationId)->delete();
    }
}
