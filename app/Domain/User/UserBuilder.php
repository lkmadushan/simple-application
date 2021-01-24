<?php

namespace App\Domain\User;

use Illuminate\Database\Eloquent\Builder;

class UserBuilder extends Builder
{
    /**
     * Search users by username or email with search string.
     *
     * @param string|null $search
     *
     * @return UserBuilder
     */
    public function search(string $search = null)
    {
        return $this->when($search, function ($query) use ($search) {
            return $query->where(function ($query) use ($search) {
                $query->where('username', 'like', $search.'%');
                $query->orWhere('email', 'like', $search.'%');
            });
        });
    }
}
