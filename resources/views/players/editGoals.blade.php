@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        {{ $player->name }}
        <a href="{{ url()->previous() }}" class="pull-right">Back</a>
    </div>
    <div class="card-body">
        <strong>League Name: </strong>{{ $league->name }}<br />
        <strong>Team Name: </strong>{{ $team->name }}<br /><br />

        <form method="post" action="{{ route('players.editGoals', [$player->id, $team->id, $league->id]) }}">
            @method('PATCH')
            @csrf
            <div class="form-group">
                <label for="name">Goals:</label>
                <input type="text" class="form-control" name="goals" value="{{ $player->leagueGoals($league->id) }}" />
            </div>
            <hr>
            <button type="submit" class="btn btn-primary pull-right">Update Player</button>
        </form>

    </div>
</div>
@endsection
