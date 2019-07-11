@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        Edit Team
        <a href="{{ url()->previous() }}" class="pull-right">Back</a>
    </div>
    <div class="card-body">
        <form method="post" action="{{ route('teams.update', $team->id) }}">
            @method('PATCH')
            @csrf
            <div class="form-group">
                <label for="name">Team Name:</label>
                <input type="text" class="form-control" name="name" value="{{ $team->name }}" />
            </div>

            <div class="form-group">
                <label for="contact">Contact:</label>
                <input type="text" class="form-control" name="contact" value="{{ $team->contact }}" />
            </div>
            <button type="submit" class="btn btn-primary pull-right">Update Team</button>
        </form>
    </div>
</div>
@endsection
