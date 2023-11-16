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
                ->select('id', 'movie_name', 'slug', 'duration', 'year', 'rating', 'thumb_url')
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
                ->where(function ($query) use ($category) {
                    $query->whereHas('categories', function ($query) use ($category) {
                                $query->where('slug', 'like', "%" . $category . "%");
                            });
                })
                ->where(function ($query) use ($country) {
                    $query->whereHas('country', function ($query) use ($country) {
                                $query->where('slug', 'like', "%" . $country . "%");
                            });
                })
                ->select('id', 'movie_name', 'slug', 'duration', 'year', 'rating', 'thumb_url')
                ->get();
    }
}