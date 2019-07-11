@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        Leagues
        @auth
        <span class="pull-right">
            <a href="{{ route('leagues.create') }}">Create</a>
        </span>
        @endauth
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <th>Name</th>
                @auth
                <th style="width:5%"></th>
                <th style="width:5%"></th>
                @endauth
            </thead>
            <tbody>
                @foreach($leagues as $league)
                <tr>
                    <td>
                        <a href="{{ route('leagues.show',$league->id) }}">{{ $league->name }}</a>
                    </td>
                    @auth
                    <td>
                        <a href="{{ route('leagues.edit',$league->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    </td>
                    <td>
                        <form action="{{ route('leagues.destroy', $league->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                        </form>
                    </td>
                    @endauth
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
