<?php

namespace App\Repositories\Movie;

use App\Models\Movie;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

interface MovieRepositoryInterface
{
    /**
     * Get all movies
     * @return Movie
     */
    public function getAll(): Collection;

    /**
     * Get detail movie
     * @param int $movieId
     * @return Movie|null
     */
    public function getDetail(int $movieId): ?Movie;

    /**
     * Search movie by name, country, category
     * @param string $name|null
     * @param string $country|null
     * @param string $category|null
     * @return Collection|null
     */
    public function search(?string $name, ?string $country, ?string $category): ?Collection;

}