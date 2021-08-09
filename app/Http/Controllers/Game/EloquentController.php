<?php

namespace App\Http\Controllers\Game;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class EloquentController extends Controller
{

    public function index()
    {
        $games = DB::table('games')
            ->join('generes', 'games.genere_id', '=', 'generes.id')
            ->select('games.id', 'title', 'score', 'generes.name')
            // ->limit(2)
            // ->offset(2)
            ->Paginate(10);

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
        $stats = [
            'count' => DB::table('games')->count(),
            'countScoreGtFive' => DB::table('games')->where('score', '>', 50)->count(),
            'max' => DB::table('games')->max('score'),
            'min' => DB::table('games')->min('score'),
            'avg' => DB::table('games')->avg('score'),
            'countScoreGtNine' => DB::table('games')->where('score', '>', 90)->count(),

        ];

        $topGames = DB::table('games')
            ->join('generes', 'games.genere_id', '=', 'generes.id')
            ->select('games.id', 'title', 'score', 'generes.name')
            ->where('score', '>', '90')
            ->get();


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
        $game = DB::table('games')
            ->join('generes', 'games.genere_id', '=', 'generes.id')
            ->select('games.id', 'games.title', 'games.publisher', 'games.description', 'generes.name')
            ->where('games.id', $gameId)
            ->first();

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
