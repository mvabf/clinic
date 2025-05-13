<?php

namespace App\Models;

use App\Enums\UserTypeEnum;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, HasApiTokens;

    protected $fillable = [
        'name',
        'email',
        'password',
        'type'
    ];

    public $timestamps = false;

    protected $casts = [
        'type' => UserTypeEnum::class,
    ];

    protected $hidden = [
        'password',
    ];

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class);
    }

    public function hasRole(string $role): bool
    {
        return $this->roles->contains('reference', $role);
    }

    public function password(): Attribute
    {
        return Attribute::make(
            set: fn (string $password) => Hash::make($password)
        );
    }

    protected static function newFactory(): Factory
    {
        return UserFactory::new();
    }
}
