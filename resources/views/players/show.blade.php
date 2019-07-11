@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        {{ $player->name }}
        <a href="{{ route('players.index') }}" class="pull-right">Back</a>
    </div>
    <div class="card-body">
        Statistics:<br />
        <strong>Goals:</strong>{{ $player->goals }}<br />
    </div>
</div>
@endsection
