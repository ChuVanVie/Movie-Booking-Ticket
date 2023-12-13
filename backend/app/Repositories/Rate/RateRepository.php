<?php
namespace App\Repositories\Rate;

use App\Models\Rate;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class RateRepository implements RateRepositoryInterface
{   
    protected Rate $rate;

    public function __construct(Rate $rate) {
        $this->rate = $rate;
    } 

    /**
     * Create new rating in 1 movie
     * @param int $movieId
     * @return bool
     */
    public function create(int $movieId, int $star, ?string $comment): bool {
        return this->rate
                    ->create([
                        'user_id' => auth()->user()->id,
                        'movie_id' => $movieId,
                        'star' => $star,
                        'comment' => $comment
                    ]);
    }

}