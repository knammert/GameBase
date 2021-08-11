<?php

namespace App\Http\Controllers\Game;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Game;

class EloquentController extends Controller
{

    public function index()
    {
        // $newGame = new Game();
        // $newGame->title = "Tomb Raider";
        // $newGame->description = "Przygoda na morzu";
        // $newGame->score = 92;
        // $newGame->publisher = "Edios";
        // $newGame->genre_id = 4;
        // $newGame->save();

        // Game::create([
        //     'title' => 'Tomb Raider 4',
        //     'description' => 'Przygoda na morzu',
        //     'score' => 80,
        //     'publisher' => 'Edios',
        //     'genre_id' => 4
        // ]);

        // $deleteGame = Game::where([
        //     'publisher' => 'Edios'
        // ])
        //     ->delete();

        $games = Game::Paginate(10);


        //->join('generes', 'games.genere_id', '=', 'generes.id')
        // ->select('games.id', 'title', 'score', 'generes.name')
        // ->limit(2)
        // ->offset(2)

        return view('game.eloquent.list', [
            'games' => $games
        ]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        $topGames = Game::with('genre')
            ->best()
            ->get();

        $stats = [
            'count' => Game::count(),
            'countScoreGtFive' => Game::where('score', '>', 50)->count(),
            'max' => Game::max('score'),
            'min' => Game::min('score'),
            'avg' => Game::avg('score'),
            'countScoreGtNine' => Game::where('score', '>', 90)->count(),

        ];

        return view('game.eloquent.dashboard', [
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
        $game = Game::find($gameId);

        return view('game.eloquent.show', [
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
