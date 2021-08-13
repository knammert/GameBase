<?php

declare(strict_types=1);

namespace App\Repository\Builder;

use App\Models\Game;
use App\Repository\GameRepository as RepositoryGameRepository;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator as PaginationPaginator;
use Illuminate\Support\Facades\DB;
use stdClass;

class GameRepository implements RepositoryGameRepository
{

    private Game $gameModel;

    public function __construct(Game $gameModel)
    {
        return $this->gameModel = $gameModel;
    }

    public function get(int $id)
    {
        $data = DB::table('games')
            ->join('genres', 'games.genre_id', '=', 'genres.id')
            ->select('games.id', 'games.title', 'games.publisher', 'games.description', 'genres.name')
            ->where('games.id', $id)
            ->first();
        // dd($data);

        return $this->createGame($data);
    }

    public function all()
    {
    }

    public function allPaginated($limit)
    {
        $pageName = 'page';
        $currentPage = PaginationPaginator::resolveCurrentPage();

        $baseQuery = DB::table('games')
            ->join('genres', 'games.genre_id', '=', 'genres.id');

        $total = $baseQuery->count();

        $data = collect();
        if ($total) {
            $data = DB::table('games')
                ->join('genres', 'games.genre_id', '=', 'genres.id')
                ->select('games.id', 'title', 'score', 'genres.name')
                ->forPage($currentPage, $limit)
                ->get()
                ->map(fn ($row) => $this->createGame($row));
        }

        return new LengthAwarePaginator(
            $data,
            $total,
            $limit,
            $currentPage,
            [
                'path' => PaginationPaginator::resolveCurrentPath()
            ]

        );
    }

    public function best()
    {
        $data = DB::table('games')
            ->join('genres', 'games.genre_id', '=', 'genres.id')
            ->select('games.id', 'title', 'score', 'genres.name')
            ->where('score', '>', '90')
            ->get()
            ->map(fn ($row) => $this->createGame($row));

        return $data;
    }

    public function stats()
    {
        return   [
            'count' => DB::table('games')->count(),
            'countScoreGtFive' => DB::table('games')->where('score', '>', 50)->count(),
            'max' => DB::table('games')->max('score'),
            'min' => DB::table('games')->min('score'),
            'avg' => DB::table('games')->avg('score'),
            'countScoreGtNine' => DB::table('games')->where('score', '>', 90)->count(),

        ];
    }

    public function createGame(stdClass $game): stdClass
    {
        $genre = new stdClass();
        $genre->name = $game->name;
        $game->genre = $genre;

        unset($game->genre_name);

        return $game;
    }
}
