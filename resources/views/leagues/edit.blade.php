@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        Edit League
        <a href="{{ route('leagues.index') }}" class="pull-right">Back</a>
    </div>
    <div class="card-body">
        <form method="post" action="{{ route('leagues.update', $league->id) }}">
            @method('PATCH')
            @csrf
            <div class="form-group">
                <label for="name">League Name:</label>
                <input type="text" class="form-control" name="name" value="{{ $league->name }}" />
            </div>
            <button type="submit" class="btn btn-primary pull-right">Update League</button>
        </form>
        @if($league->generatedFixtures != true)
        <a href="{{ route('generateFixtures', $league->id) }}">Generate Fixtures</a>
        @endif
    </div>
</div>
@endsection
