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

        $fixture->pointsAdded = ($request->get('pointsAdded') == 'on' ? 1 : null);
        $fixture->save();

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
