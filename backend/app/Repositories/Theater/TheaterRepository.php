<?php
namespace App\Repositories\Theater;

use App\Models\Theater;
use App\Models\Showtime;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class TheaterRepository implements TheaterRepositoryInterface
{
    protected Showtime $showtime;
    protected Theater $theater;

    public function __construct(Showtime $showtime, Theater $theater){
        $this->showtime = $showtime;
        $this->theater = $theater;
    }

    /**
     * Get theater name
     * @param int $theaterId|null
     * @return String|null
     */
    public function getName(int $showtimeId): ?String {
        $showtime = $this->showtime->find($showtimeId);
        $theater = $this->theater->find($showtime->theater_id);
        return $theater->theater_name;
    }

}