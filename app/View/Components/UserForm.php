<?php

namespace App\View\Components;

use App\Domain\User\User;
use Illuminate\Support\Collection;

class UserForm extends BaseComponent
{
    /**
     * Roles.
     *
     * @var Collection
     */
    public $roles;

    public function __construct(User $user, Collection $roles)
    {
        parent::__construct($user);
        $this->roles = $roles;
    }
}
