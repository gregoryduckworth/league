<?php

namespace App\Http\Controllers;

use App\Fixture;
use App\League;
use App\Team;
use Illuminate\Http\Request;

class LeagueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('leagues.index')->with('leagues', League::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('leagues.create')
            ->with('teams', Team::all());
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
            'name' => 'required|unique:leagues',
        ]);

        $league = new League([
            'name' => $request->get('name'),
        ]);

        $league->save();
        return redirect(route('leagues.index'))->with('success', 'League saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('leagues.show')->with('league', League::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('leagues.edit')
            ->with('league', League::find($id))
            ->with('teams', Team::all());
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
            'name' => 'required|unique:leagues,' . $id,
        ]);

        $league = League::find($id);
        $league->name = $request->get('name');
        $league->save();

        return redirect(route('leagues.index'))->with('success', 'League updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $league = League::find($id);
        $league->delete();

        return redirect(route('leagues.index'))->with('success', 'League deleted!');
    }

    public function generateFixtures($id)
    {
        $league = League::find($id);
        if ($league->generatedFixtures != true) {
            $teams = $league->teams()->get();

            $team_games = [];
            foreach ($teams as $i => $team_1) {
                $team_games[$team_1->id] = [];
                foreach ($teams as $j => $team_2) {
                    $team_games[$team_1->id][$team_2->id] = $this->getweek(($i + 1), ($j + 1), count($teams));
                }
            }

            foreach ($team_games as $team_1 => $game) {
                foreach ($game as $team_2 => $g) {
                    if ($g != -1) {
                        $fixture = new Fixture([
                            'team_1' => $team_1,
                            'team_1_score' => 0,
                            'team_2' => $team_2,
                            'team_2_score' => 0,
                        ]);
                        $league->fixtures()->save($fixture);
                    }
                }
            }
            $league->update(['generatedFixtures' => true]);
        }
        return view('leagues.show')->with('league', League::find($id));
    }

    public function getweek($home, $away, $num_teams)
    {
        if ($home == $away) {
            return -1;
        }
        $week = $home + $away - 2;
        if ($week >= $num_teams) {
            $week = $week - $num_teams + 1;
        }
        if ($home > $away) {
            $week += $num_teams - 1;
        }

        return $week;

    }
}
