<?php

namespace App\Http\Controllers;

use App\League;
use App\Player;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('players.index')->with('players', Player::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('players.create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('players.edit')
            ->with('player', Player::find($id));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $player = new Player([
            'name' => $request->get('name'),
            'team_id' => $request->get('team'),
        ]);
        $player->save();
        return redirect(route('players.index'))->with('success', 'Player saved!');
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
        $request->validate([
            'name' => 'required',
        ]);

        $player = Player::find($id);
        $player->update([
            'name' => $request->get('name'),
            'team' => $request->get('team'),
            'goals' => $request->get('goals'),
        ]);
        $player->save();

        return redirect(route('players.index'))->with('success', 'Player saved!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editGoals($player_id, $league_id)
    {
        return view('players.editGoals')
            ->with('league', League::find($league_id))
            ->with('player', Player::find($player_id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function postEditGoals(Request $request, $player_id, $league_id)
    {
        $player = Player::find($player_id);
        $playerStats = $player->stats->where('league_id', '=', $league_id)->first();
        $playerStats->update(['goals' => $request->get('goals')]);
        return redirect(route('players.show', $player_id))->with('success', 'Player updated!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('players.show')->with('player', Player::find($id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $player = Player::find($id);
        $player->delete();

        return redirect(route('players.index'))->with('success', 'Player deleted!');
    }
}
