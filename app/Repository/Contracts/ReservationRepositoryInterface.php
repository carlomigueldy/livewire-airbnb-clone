<?php

namespace App\Repository\Contracts;

use App\Models\Reservation;
use App\Models\Review;
use app\Repository\Contracts\EloquentRepositoryInterface;

interface ReservationRepositoryInterface extends EloquentRepositoryInterface
{
    /**
     * @param array $payload
     * @return null|Reservation
     */
    public function createReservation(array $payload): ?Reservation;

    /**
     * @param int $reservationId
     * @param array $payload
     * @return null|Review
     */
    public function createReviewForReservation(int $reservationId, array $payload): ?Review;

    /**
     * @param int $reservationId
     * @return null|bool
     */
    public function deleteReviewForReservation(int $reservationId): ?bool;
}
