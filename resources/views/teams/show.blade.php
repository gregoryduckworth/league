@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        {{ $team->name }}
        <a href="{{ url()->previous() }}" class="pull-right">Back</a>
    </div>
    <div class="card-body">
        <strong>Team Name:</strong><br />
        {{ $team->name }}<br />

        <strong>Contact Name:</strong><br />
        {{ $team->contact }}<br />
        <hr>
        <strong>Leagues:</strong><br />
        @foreach($team->leagues as $league)
            <label><a href="{{ route('leagues.show',$league->id) }}">{{ $league->name }}</a></label><br />
            <strong>Scorers:</strong><br />
            @foreach($team->players as $player)
                <li><a href="{{ route('players.show', $player->id) }}">{{ $player->name }}</a> - {{ $player->goals($league->id, $team->id) }}</li>
            @endforeach
        @endforeach
    </div>
</div>
@endsection
