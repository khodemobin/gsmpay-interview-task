<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

    /** @use HasFactory<UserFactory> */
    use HasFactory;

    protected $guarded = ['id'];
    protected $hidden = ["password"];

    /**
     * @return HasMany<Post, $this>
     */
    public function post(): HasMany
    {
        return $this->hasMany(Post::class);
    }
}
