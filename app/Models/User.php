<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /** @use HasFactory<UserFactory> */
    use HasFactory;

    protected $guarded = ['id'];

    protected $hidden = ['password'];

    /**
     * @return HasMany<Post, $this>
     */
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    public function scopeSortByPostViewCount(Builder $query): void
    {
        $query->withCount(['posts as total_views' => function ($query) {
            $query->select(DB::raw('COALESCE(SUM(view_count), 0)'));
        }])->orderByDesc('total_views');
    }
}
