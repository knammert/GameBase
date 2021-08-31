<?php

namespace App\Http\Controllers\Game;

use App\Facade\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Repository\GameRepository;
use Illuminate\Support\Facades\Auth;

class GameController extends Controller
{
    private GameRepository $gameRepository;

    public function __construct(GameRepository $repository)
    {
        $this->gameRepository = $repository;
    }

    public function index(Request $request)
    {
        $phrase = $request->get('phrase');
        $type = $request->get('type', 'game');

        $resultPaginator = $this->gameRepository->filterBy($phrase, $type, 15);
        $resultPaginator->appends([
            'phrase' => $phrase,
            'type' => $type
        ]);

        return view('game.list', [
            'games' => $resultPaginator,
            'phrase' => $phrase,
            'type' => $type
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
        $user = Auth::user();
        $userHasGame = $user->hasGame($gameId);

        $game = $this->gameRepository->get($gameId);

        return view('game.show', [
            'game' => $game,
            'userHasGame' => $userHasGame
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
