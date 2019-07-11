@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        Edit League
        <a href="{{ url()->previous() }}" class="pull-right">Back</a>
    </div>
    <div class="card-body">
        <form method="post" action="{{ route('leagues.update', $league->id) }}">
            @method('PATCH')
            @csrf
            <div class="form-group">
                <label for="name">League Name:</label>
                <input type="text" class="form-control" name="name" value="{{ $league->name }}" />
            </div>
            <hr>
            <button type="submit" class="btn btn-primary pull-right">Update League</button>
        </form>
        <label for="teams">Teams:</label>
        @if($league->generatedFixtures != true)
        <form method="post" action="{{ route('leagues.addTeams', $league->id) }}">
            @method('PATCH')
            @csrf
            @foreach(App\Team::all() as $team)
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="{{ $team->name }}" name="{{ $team->id }}"
                    {{ $team->inLeague($league->id) ? 'checked="checked"' : '' }}>
                <label class="form-check-label" value="{{ $team->name }}">{{ $team->name}}</label>
            </div>
            @endforeach
            <hr>
            <button type="submit" class="btn btn-primary pull-right">Add Teams</button>
        </form>
        <a href="{{ route('generateFixtures', $league->id) }}" class="btn btn-success pull-left">Generate Fixtures</a>
        @else
        @foreach($league->teams as $team)
        <li>{{ $team->name }}</li>
        @endforeach
        @endif
    </div>
</div>
@endsection
