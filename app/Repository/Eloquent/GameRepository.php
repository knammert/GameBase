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
        return $this->gameModel
            ->with('genres')
            ->Paginate($limit);
    }

    public function best()
    {
        $topGames = $this->gameModel
            ->best()
            ->get();

        // dd($topGames);
        return  $topGames;
    }

    public function stats()
    {
        $avg = $this->gameModel->avg('metacritic_score');
        $avg = round((float)$avg, 1);
        return   [
            'count' => $this->gameModel->count(),
            'countScoreGtFive' => $this->gameModel->where('metacritic_score', '>', 50)->count(),
            'max' => $this->gameModel->max('metacritic_score'),
            'min' => $this->gameModel->min('metacritic_score'),
            'avg' => $avg,
            'countScoreGtNine' => $this->gameModel->where('metacritic_score', '>', 90)->count(),

        ];
    }
}
