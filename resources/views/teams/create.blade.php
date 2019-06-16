@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        Add a Team
        <a href="{{ route('teams.index') }}" class="pull-right">Back</a>
    </div>
    <div class="card-body">
        <form method="post" action="{{ route('teams.store') }}">
            @csrf
            <div class="form-group">
                <label for="name">Team Name:</label>
                <input type="text" class="form-control" name="name" />
            </div>

            <div class="form-group">
                <label for="contact">Contact:</label>
                <input type="text" class="form-control" name="contact" />
            </div>
            <button type="submit" class="btn btn-primary pull-right">Add Team</button>
        </form>
    </div>
</div>
@endsection
