@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        {{ $player->name }}
        <a href="{{ url()->previous() }}" class="pull-right">Back</a>
    </div>
    <div class="card-body">
        Statistics:<br />
        <table class="table">
            <thead>
                <th>League Name</th>
                <th>Goals</th>
                @auth
                <th>Actions</th>
                @endauth
            </thead>
            <tbody>
                @foreach($player->stats as $stat)
                <tr>
                    <td>
                        {{ \App\Team::find($stat->team_id)->name }} - <a href="{{ route('leagues.show', $stat->league_id) }}">{{ \App\League::find($stat->league_id)->name }}</a>
                    </td>
                    <td>
                        {{ $stat->goals }}
                    </td>
                    @auth
                    <td>
                        <a href="{{ route('players.editGoals', [$player->id, $stat->team_id, $stat->league_id]) }}"
                            class="btn btn-warning btn-sm">
                            Edit Goals
                        </a>
                    </td>
                    @endauth
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
