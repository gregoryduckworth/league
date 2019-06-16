@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        Create a League
        <a href="{{ route('leagues.index') }}" class="pull-right">Back</a>
    </div>
    <div class="card-body">
        <form method="post" action="{{ route('leagues.store') }}">
            @csrf
            <div class="form-group">
                <label for="name">League Name:</label>
                <input type="text" class="form-control" name="name" />
            </div>
            <button type="submit" class="btn btn-primary pull-right">Create League</button>
        </form>
    </div>
</div>
@endsection
