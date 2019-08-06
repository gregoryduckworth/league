@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            {{ $league->name }}
            <a href="{{ url()->previous() }}" class="pull-right">Back</a>
        </div>
        <div class="card-body">
            <table class="table" id="league_table">
                <thead>
                    <th>Team Name</th>
                    <th>P</th>
                    <th>W</th>
                    <th>D</th>
                    <th>L</th>
                    <th>GF</th>
                    <th>GA</th>
                    <th>+/-</th>
                    <th>Points</th>
                </thead>
                <tbody>
                    @foreach($league->teamStandings as $team)
                    <tr>
                        <td>
                            <a href="{{ route('teams.show',$team->id) }}">{{ $team->name }}</a>
                        </td>
                        <td>
                            {{ $team->won + $team->drawn + $team->lost }}
                        </td>
                        <td>
                            {{ $team->won }}
                        </td>
                        <td>
                            {{ $team->drawn }}
                        </td>
                        <td>
                            {{ $team->lost }}
                        </td>
                        <td>
                            {{ $team->team_1_for + $team->team_2_for }}
                        </td>
                        <td>
                            {{ $team->team_1_against + $team->team_2_against }}
                        </td>
                        <td>
                            {{ ($team->team_1_for + $team->team_2_for) - ($team->team_1_against + $team->team_2_against ) }}
                        </td>
                        <td>
                            {{ $team->points }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <hr>
            <table class="table" id="fixture_table">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Home</th>
                        <th></th>
                        <th>v</th>
                        <th></th>
                        <th>Away</th>
                        @auth
                        <th>Actions</th>
                        @endauth
                    </tr>
                </thead>
                <tbody>
                    @foreach($league->fixtures as $fixture)
                    <tr>
                        <td>{{ $fixture->date }}</td>
                        <td><a href="{{ route('teams.show', $fixture->team_1) }}">{{ App\Team::find($fixture->team_1)->name }}</a></td>
                        <td>{{ $fixture->team_1_score }}</td>
                        <td>v</td>
                        <td>{{ $fixture->team_2_score }}</td>
                        <td><a href="{{ route('teams.show', $fixture->team_2) }}">{{ App\Team::find($fixture->team_2)->name }}</a></td>
                        @auth
                        <td><a href="{{ route('fixtures.edit',$fixture->id) }}" class="btn btn-warning btn-sm">Edit</a></td>
                        @endauth
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <hr>
            <table class="table" id="league_scorers">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Goals</th>
                        <th>Team</th>
                        @auth
                        <th>Actions</th>
                        @endauth
                    </tr>
                </thead>
                <tbody>
                    @foreach($league->teams as $team)
                        @foreach($team->players as $player)
                        <tr>
                            <td><a href="{{ route('players.show', $player->id) }}">{{ $player->name }}</a></td>
                            <td>{{ $player->leagueGoals($league->id) }}</td>
                            <td>{{ $team->name }}</td>
                            @auth
                            <td>
                                <a href="{{ route('players.editGoals', [$player->id, $team->id, $league->id]) }}"
                                    class="btn btn-warning btn-sm">
                                    Edit
                                </a>
                            </td>
                            @endauth
                        </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
            <hr>
        </div>
    </div>
@endsection

@section('script')
<script>
    $(document).ready(function () {
        $('#league_table').DataTable({
            aaSorting: [
                [7, 'desc'],
                [6, 'desc'],
                [4, 'desc'],
                [5, 'desc'],
            ],
            bPaginate: false,
            searching: false,
            info: false,
            lengthChange: false,
            responsive: true
        });
        $('#fixture_table').DataTable({
            aaSorting: [
                [0, 'asc'],
            ],
            bPaginate: false,
            columnDefs: [{
                targets: [2, 3, 4],
                orderable: false,
            }],
            info: false,
            lengthChange: false,
            language: {
                "emptyTable": "No fixtures have been generated yet. Let's go and <a href='{{ route('leagues.edit', $league->id) }}'>generate fixtures</a>"
            },
            responsive: true
        });
        $('#league_scorers').DataTable({
            aaSorting: [
                [1, 'desc'],
                [0, 'asc'],
            ],
            responsive: true
        });
    });

</script>
@endsection
