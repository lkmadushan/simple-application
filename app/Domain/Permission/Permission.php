<?php

namespace App\Domain\Permission;

use App\Domain\BaseModel;
use App\Domain\Role\Role;
use Database\Factories\PermissionFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Permission extends BaseModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
    ];

    /**
     * Roles of the permission.
     *
     * @return BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    /**
     * Create a new factory instance for the model.
     *
     * @return Factory
     */
    public static function newFactory()
    {
        return PermissionFactory::new();
    }
}
