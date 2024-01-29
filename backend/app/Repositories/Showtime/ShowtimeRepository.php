<?php

namespace App\Repositories\Showtime;

use App\Models\Showtime;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Carbon\Carbon;

class ShowtimeRepository implements ShowtimeRepositoryInterface
{

    protected Showtime $showtime;

    public function __construct(Showtime $showtime)
    {
        $this->showtime = $showtime;
    }

    /**
     * Get all showtimes of movie
     * @param int $movieId|null
     * @param int $cinemaId|null
     * @param string $time
     * @return Collection|null
     */
    public function getShowtimes(?int $movieId, ?int $cinemaId, string $time): ?Collection {
        $query = $this->showtime::query();

        if ($movieId !== null) {
            $query->where('movie_id', $movieId);
        }

        if ($cinemaId !== null) {
            $query->where('cinema_id', $cinemaId);
        }

        //Convert $time sang dạng date
        $time = Carbon::parse($time)->toDateString();
        // dd($time);
        $query
            ->where('status', config('constants.SHOWTIME_STATUS.NOW_SHOWING'))
            ->whereDate('start_time', '<=', $time)
            ->whereDate('end_time', '>=', $time)
            ->with(['cinema' => function($query) {
                        $query->select(['id', 'cinema_name']);
                    },
                    'theater' => function($query) {
                        $query->select(['id', 'theater_name', 'capacity', 'status'])
                        ->withCount(['seats as available_seats_count' => function($query){
                                $query->where('status', 'Available');
                        }]);
                    },
                    'movie' => function($query){
                        $query->select(['id', 'movie_name', 'slug', 'duration', 'thumb_url'])
                        ->with(['categories' => function ($query) {
                            $query->select('category_id', 'category_name', 'slug');
                        }]);
                    }
                ]);
                
        $showtimes = $query->get();

        return $showtimes;
    }

    /**
     * Get detail showtime
     * @param int $showtimeId
     * @return Showtime|null
     */
    public function getDetail(int $showtimeId): ?Showtime {
        return $this->showtime
                    ->where(['id' => $showtimeId])
                    ->select(['id', 'movie_id', 'cinema_id', 'theater_id', 'start_time', 'end_time'])
                        ->with([
                            //Get movie info
                            'movie' => function($query) {
                                $query->select(['id', 'movie_name']);
                            },
                            //Get cinema info
                            'cinema' => function($query) {
                                $query->select(['id', 'cinema_name']);
                            },
                            //Get theater info
                            'theater' => function($query) {
                                $query->select(['id', 'theater_name']);
                            },
                        ])
                    ->first();
    }

}