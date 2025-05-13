<?php

use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

beforeEach(function (): void {
    $this->user = User::factory()->create();
    $this->role = Role::factory()->create();
});

it('attaches a role to the user', function (): void {
    $this->user->roles()->attach($this->role);

    expect($this->user->roles)->toHaveCount(1)
        ->and($this->user->hasRole($this->role->reference))->toBeTrue();
});
