@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h3>List of all the BBC Football Leagues!</h3>
                    @foreach($leagues as $league)
                    <li><a href="{{ route('leagues.show', $league->id) }}">{{ $league->name }}</a></li>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
