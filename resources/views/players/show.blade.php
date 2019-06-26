@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        {{ $player->name }}
        <a href="{{ route('players.index') }}" class="pull-right">Back</a>
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
                @foreach($player->leagues as $league)
                <tr>
                    <td>
                        <a href="{{ route('leagues.show',$league->id) }}">{{ $league->name }}</a>
                    </td>
                    <td>
                        {{ $player->leagueGoals($league->id) }}
                    </td>
                    <td>
                        <a href="{{ route('players.editGoals', [$player->id, $league->id]) }}"
                            class="btn btn-warning btn-sm">
                            Edit
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
