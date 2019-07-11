<?php

namespace App\Http\Controllers;

use App\League;
use App\Player;
use App\PlayerStat;
use App\Team;
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
            'team_id' => $request->get('team'),
        ]);
        $player->save();
        $team = Team::find($player->team_id);
        $league = $team->leagues;
        if (!$player->stats->where('league_id', $league[0]->id)->where('team_id', $team->id)->first()) {
            $playerStat = new PlayerStat([
                'player_id' => $player->id,
                'league_id' => $league[0]->id,
                'team_id' => $team->id,
            ]);
            $playerStat->save();

        }
        return redirect(route('players.index'))->with('success', 'Player saved!');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
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
        $team = Team::find($player->team_id);
        $league = $team->leagues;
        $playerStat = new PlayerStat([
            'player_id' => $player->id,
            'league_id' => $league[0]->id,
            'team_id' => $player->team_id,
        ]);
        $playerStat->save();
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
