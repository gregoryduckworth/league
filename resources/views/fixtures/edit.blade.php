@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        Edit Fixture
        <a href="{{ route('leagues.show', $fixture->league_id) }}" class="pull-right">Back</a>
    </div>
    <div class="card-body">
        <form method="post" action="{{ route('fixtures.updateDate', $fixture->id) }}">
            @method('PATCH')
            @csrf
            <div class="form-group">
                <label for="date">Date of fixture:</label>
                <input type="date" class="form-control" name="date" value="{{ $fixture->date }}" />
            </div>
            <button type="submit" class="btn btn-primary pull-right">Update Date</button>
        </form>
    </div>
    <div class="card-body">
        <form method="post" action="{{ route('fixtures.update', $fixture->id) }}">
            @method('PATCH')
            @csrf
            <div class="form-group">
                <label for="name">{{ App\Team::find($fixture->team_1)->name }} Score:</label>
                <input type="text" class="form-control" name="team_1_score" value="{{ $fixture->team_1_score }}" />
            </div>
            <div class="form-group">
                <label for="name">{{ App\Team::find($fixture->team_2)->name }} Score:</label>
                <input type="text" class="form-control" name="team_2_score" value="{{ $fixture->team_2_score }}" />
            </div>
            <button type="submit" class="btn btn-primary pull-right">Update Score</button>
        </form>
    </div>
</div>
@endsection
