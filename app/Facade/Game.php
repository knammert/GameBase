<?php

declare(strict_types=1);

namespace App\Facade;

use App\Repository\GameRepository;
use Illuminate\Support\Facades\Facade;

class Game extends Facade
{
    protected static function getFacadeAccessor()
    {
        return GameRepository::class;
    }
}
