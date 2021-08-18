<?php

namespace App\Http\Controllers\Game;

use App\Facade\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Repository\GameRepository;


class GameController extends Controller
{
    private GameRepository $gameRepository;

    public function __construct(GameRepository $repository)
    {
        $this->gameRepository = $repository;
    }

    public function index()
    {
        return view('game.list', [
            'games' => $this->gameRepository->allPaginated(10)
            //  'games' => Game::allPaginated(10)

        ]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        $topGames = $this->gameRepository->best();
        $stats = $this->gameRepository->stats();

        return view('game.dashboard', [
            'stats' => $stats,
            'topGames' => $topGames
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $gameId)
    {
        $game = $this->gameRepository->get($gameId);

        return view('game.show', [
            'game' => $game
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
