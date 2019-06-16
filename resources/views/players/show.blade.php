@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        {{ $player->name }}
        <a href="{{ route('teams.show', $player->team_id) }}" class="pull-right">Back</a>
    </div>
    <div class="card-body">
        Leagues:<br />

    </div>
</div>
@endsection
