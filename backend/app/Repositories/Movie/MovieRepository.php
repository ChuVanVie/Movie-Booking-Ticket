<?php

namespace App\Repositories\Movie;

use App\Models\Movie;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class MovieRepository implements MovieRepositoryInterface
{
    protected Movie $movie;

    public function __construct(Movie $movie)
    {
        $this->movie = $movie;
    }

    public function getAll(): Collection
    {
        return $this->movie
                ->select('id', 'movie_name', 'slug', 'duration', 'year', 'premiere_date', 'rating', 'thumb_url', 'poster_url')
                ->orderBy('rating', 'desc')
                ->get();
    }

    public function getDetail(int $movieId): ?Movie
    {
        return $this->movie
                ->with([
                    'country' => function ($query) {
                        $query->select('id', 'country_name', 'slug');
                    },
                    'categories' => function ($query) {
                        $query->select('category_id', 'category_name', 'slug');
                    },
                    'rates' => function ($query) {
                        $query
                            ->with(['user' => function ($query) {
                                  $query->select('id', 'name');
                            }]);
                    },
                ])
                ->where('id', $movieId)
                ->first();
    }

    public function search(?string $name, ?string $country, ?string $category): ?Collection
    {
        return $this->movie
                ->where('movie_name', 'like', '%' . $name . '%')
                ->when($category, function ($query) use ($category) {
                    return $query->whereHas('categories', function ($query) use ($category) {
                        $query->where('slug', $category);
                    });
                })
                ->when($country, function ($query) use ($country) {
                    return $query->whereHas('country', function ($query) use ($country) {
                        $query->where('slug', $country);
                    });
                })
                ->select('id', 'movie_name', 'slug', 'duration', 'year', 'premiere_date', 'rating', 'thumb_url')
                ->get();
    }

    /**
     * Update movie's rating
     * @param int $movieId
     * @param int $star
     * @return bool
     */
    public function updateRating(int $movieId, int $star, array $listStar): bool {
        $listStar[] = $star;
        $newRating = number_format(array_sum($listStar) / count($listStar), 1);
        
        return $this->movie->where('id', $movieId)
                    ->update(['rating' => $newRating]);
    }
}