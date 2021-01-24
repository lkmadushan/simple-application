<?php

namespace Database\Seeders;

use App\Domain\Permission\Permission;
use App\Domain\Role\Role;

class RoleSeeder extends DatabaseSeeder
{
    /**
     * Seed the roles table.
     *
     * @return void
     */
    public function run()
    {
        Role::factory()
            ->has(Permission::factory()->count(3))
            ->count(3)
            ->create();
    }
}
