@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        Edit Player
        <a href="{{ route('players.index') }}" class="pull-right">Back</a>
    </div>
    <div class="card-body">
        <form method="post" action="{{ route('players.update', $player->id) }}">
            @method('PATCH')
            @csrf
            <div class="form-group">
                <label for="name">Player Name:</label>
                <input type="text" class="form-control" name="name" value="{{ $player->name }}">
            </div>
            <div class="form-group">
                <label for="name">Team:</label>
                <select class="form-control" name="team">
                @foreach(\App\Team::all() as $team)
                    <option value="{{ $team->id }}" @if($player->team_id == $team->id) selected @endif>{{ $team->name }}</option>
                @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="name">Goals:</label>
                <input type="text" class="form-control" name="goals" value="{{ $player->goals }}">
            </div>
            <hr>
            <button type="submit" class="btn btn-primary pull-right">Update Player</button>
        </form>
    </div>
</div>
@endsection
