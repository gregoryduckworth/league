@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        {{ $team->name }}
        <a href="{{ route('teams.index') }}" class="pull-right">Back</a>
    </div>
    <div class="card-body">
        Team Name:<br />
        {{ $team->name }}<br />

        Contact Name:<br />
        {{ $team->contact }}<br />

        Leagues:<br />
        @foreach($team->leagues as $league)
        <li><a href="{{ route('leagues.show',$league->id) }}">{{ $league->name }}</a></li>
        @endforeach

        Players:<br />
        @foreach($team->players as $player)
        <li><a href="{{ route('players.show', $player->id) }}">{{ $player->name }}</a></li>
        @endforeach
    </div>
</div>
@endsection
