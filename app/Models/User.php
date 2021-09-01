<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function games()
    {
        return $this->belongsToMany(Game::class, 'userGames')
            ->withPivot('rate')
            ->with('genres');
    }

    public function addGame(Game $game): void
    {
        $this->games()->save($game);
    }

    public function hasGame(int $gameId): bool
    {
        $game = $this->games()
            ->where('userGames.game_id', $gameId)
            ->first();

        return (bool)$game;
    }
    public function removeGame(Game $game)
    {
        $this->games()->detach($game->id);
    }

    public function rateGame(Game $game, int $rate): void
    {
        $this->games()->updateExistingPivot($game, ['rate' => $rate]);
    }

    public function isAdmin(): bool
    {
        return (bool) $this->admin;
    }
}
