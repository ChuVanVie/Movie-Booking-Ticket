<?php

namespace App\Repositories\User;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class UserRepository implements UserRepositoryInterface
{
    protected User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function create(array $data): User
    {
        return $this->user->create($data);
    }

    public function update(int $userId, array $data): bool
    {
        return $this->user
            ->where('id', $userId)
            ->update($data);
    }

    public function findByEmail(string $email): ?User
    {
        return $this->user
            ->where('email', $email)
            ->first();
    }

    public function findByPhoneNumber(string $phoneNumber): ?User
    {
        return $this->user
            ->where('phone', $phoneNumber)
            ->first();
    }

}