<?php

namespace App\Http\Controllers;

use App\Fixture;
use App\League;
use Illuminate\Http\Request;

class FixtureController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('fixtures.edit')
            ->with('fixture', Fixture::find($id));
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
            'team_1_score' => 'required|integer',
            'team_2_score' => 'required|integer',
        ]);

        $fixture = Fixture::find($id);
        $fixture->update([
            'team_1_score' => $request->get('team_1_score'),
            'team_2_score' => $request->get('team_2_score'),
        ]);

        $league = League::find($fixture->league_id);
        $team_1 = $league->teams()->where('team_id', '=', $fixture->team_1)->first();
        $team_2 = $league->teams()->where('team_id', '=', $fixture->team_2)->first();

        if ($fixture->pointsAdded == null) {
            if ($fixture->team_1_score > $fixture->team_2_score) {
                $team_1->pivot->points += 3;
                $team_1->pivot->won += 1;
                $team_2->pivot->lost += 1;
            } else if ($fixture->team_1_score < $fixture->team_2_score) {
                $team_2->pivot->points += 3;
                $team_2->pivot->won += 1;
                $team_1->pivot->lost += 1;
            } else {
                $team_1->pivot->points += 1;
                $team_2->pivot->points += 1;
                $team_1->pivot->drawn += 1;
                $team_2->pivot->drawn += 1;
            }
            $team_1->pivot->goalsFor += $fixture->team_1_score;
            $team_1->pivot->goalsAgainst += $fixture->team_2_score;
            $team_2->pivot->goalsFor += $fixture->team_2_score;
            $team_2->pivot->goalsAgainst += $fixture->team_1_score;
            $team_1->pivot->save();
            $team_2->pivot->save();
            $fixture->pointsAdded = 1;
            $fixture->save();
        }

        return redirect(route('leagues.show', $fixture->league_id))->with('success', 'Fixture updated!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateDate(Request $request, $id)
    {
        $request->validate([
            'date' => 'required|date',
        ]);

        $fixture = Fixture::find($id);
        $fixture->update([
            'date' => $request->get('date'),
        ]);

        return redirect(route('leagues.show', $fixture->league_id))->with('success', 'Fixture updated!');
    }
}
