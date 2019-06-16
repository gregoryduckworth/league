@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        Teams
        <span class="pull-right">
            <a href="{{ route('teams.create') }}">Create</a>
        </span>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <th>Name</th>
                <th>Contact</th>
                <th style="width:5%"></th>
                <th style="width:5%"></th>
            </thead>
            <tbody>
                @foreach($teams as $team)
                <tr>
                    <td><a href="{{ route('teams.show', $team->id) }}">{{ $team->name }}</a></td>
                    <td>{{ $team->contact }}</td>
                    <td>
                        <a href="{{ route('teams.edit',$team->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    </td>
                    <td>
                        <form action="{{ route('teams.destroy', $team->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
