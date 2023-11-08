<?php

namespace App\Repositories\User;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

interface UserRepositoryInterface
{
    /**
     * Create user
     * @param array $data
     * @return User
     */
    public function create(array $data): User;

    /**
     * Update user
     * @param int $userId
     * @param array $data
     * @return bool
     */
    public function update(int $userId, array $data): bool;

    /**
     * Find user by email
     * @param string $email
     * @return User|null
     */
    public function findByEmail(string $email): ?User;

    /**
     * Find user by phone number
     * @param string $phoneNumber
     * @return User|null
     */
    public function findByPhoneNumber(string $phoneNumber): ?User;

}