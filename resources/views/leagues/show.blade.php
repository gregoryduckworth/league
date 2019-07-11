@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        {{ $league->name }}
        <a href="{{ route('leagues.index') }}" class="pull-right">Back</a>
    </div>
    <div class="card-body">
        <table class="table" id="league_table">
            <thead>
                <th>Team Name</th>
                <th>W</th>
                <th>D</th>
                <th>L</th>
                <th>GF</th>
                <th>GA</th>
                <th>+/-</th>
                <th>Points</th>
            </thead>
            <tbody>
                @foreach($league->teams as $team)
                <tr>
                    <td>
                        <a href="{{ route('teams.show',$team->id) }}">{{ $team->name }}</a>
                    </td>
                    <td>
                        {{ $team ->pivot->won }}
                    </td>
                    <td>
                        {{ $team ->pivot->drawn }}
                    </td>
                    <td>
                        {{ $team ->pivot->lost }}
                    </td>
                    <td>
                        {{ $team ->pivot->goalsFor }}
                    </td>
                    <td>
                        {{ $team ->pivot->goalsAgainst }}
                    </td>
                    <td>
                        {{ ($team ->pivot->goalsFor - $team->pivot->goalsAgainst) }}
                    </td>
                    <td>
                        {{ $team ->pivot->points }}
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
                        <td>{{ $player->goals($league->id) }}</td>
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
            "aaSorting": [
                [7, 'desc'],
                [6, 'desc'],
                [4, 'desc'],
                [5, 'desc'],
            ],
            "bPaginate": false,
            "searching": false,
            "info": false,
            "lengthChange": false,
        });
        $('#fixture_table').DataTable({
            "aaSorting": [
                [0, 'asc'],
            ],
            "bPaginate": false,
            "columnDefs": [{
                "targets": [2, 3, 4],
                "orderable": false,
            }],
            "searching": false,
            "info": false,
            "lengthChange": false,
            "language": {
                "emptyTable": "No fixtures have been generated yet. Let's go and <a href='{{ route('leagues.edit', $league->id) }}'>generate fixtures</a>"
            }
        });
        $('#league_scorers').DataTable({
            "aaSorting": [
                [1, 'desc'],
                [0, 'asc'],
            ],
        });
    });

</script>
@endsection
