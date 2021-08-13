<?php

declare(strict_types=1);

namespace App\Repository\Eloquent;

use App\Models\Game;
use App\Repository\GameRepository as RepositoryGameRepository;

class GameRepository implements RepositoryGameRepository
{

    private Game $gameModel;

    public function __construct(Game $gameModel)
    {
        return $this->gameModel = $gameModel;
    }

    public function get(int $id)
    {
        return $this->gameModel->find($id);
    }

    public function all()
    {
    }

    public function allPaginated($limit)
    {
        return $this->gameModel->Paginate($limit);
    }

    public function best()
    {
        return $this->gameModel->with('genre')
            ->best()
            ->get();
    }

    public function stats()
    {
        return   [
            'count' => $this->gameModel->count(),
            'countScoreGtFive' => $this->gameModel->where('score', '>', 50)->count(),
            'max' => $this->gameModel->max('score'),
            'min' => $this->gameModel->min('score'),
            'avg' => $this->gameModel->avg('score'),
            'countScoreGtNine' => $this->gameModel->where('score', '>', 90)->count(),

        ];
    }
}
