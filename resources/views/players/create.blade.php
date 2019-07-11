@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        Create a Player
        <a href="{{ route('players.index') }}" class="pull-right">Back</a>
    </div>
    <div class="card-body">
        <form method="post" action="{{ route('players.store') }}">
            @csrf
            <div class="form-group">
                <label for="name">Player Name:</label>
                <input type="text" class="form-control" name="name" />
            </div>
            <div class="form-group">
                <label for="name">Team:</label>
                <select class="form-control" name="team">
                @foreach(\App\Team::all() as $team)
                    <option value="{{ $team->id }}">{{ $team->name }}</option>
                @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary pull-right">Create Player</button>
        </form>
    </div>
</div>
@endsection
