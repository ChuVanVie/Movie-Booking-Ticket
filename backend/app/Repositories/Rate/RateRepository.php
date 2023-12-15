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
     * Create new rating for movie
     * @param array $data
     * @return bool
     */
    public function create(array $data): bool {
        if (empty($data['user_id']) || empty($data['movie_id']) || empty($data['star'])) {
            return false;
        }

        $newRate =  this->rate->create($data);
        
        return true;
    }

    /**
     * Find rate whom user was evaluated
     * @param int $userId
     * @param int $movieId
     * @return Rate||null
     */
    public function find(int $userId, int $movieId): ?Rate {
        return $this->rate
                   ->where(['user_id' => $userId, 'movie_id' => $movieId])
                   ->first();
    }

}