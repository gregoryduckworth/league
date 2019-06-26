@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        Players
        <span class="pull-right">
            <a href="{{ route('players.create') }}">Create</a>
        </span>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <th>Name</th>
                <th style="width:5%"></th>
                <th style="width:5%"></th>
            </thead>
            <tbody>
                @foreach($players as $player)
                <tr>
                    <td><a href="{{ route('players.show', $player->id) }}">{{ $player->name }}</a></td>
                    <td>
                        <a href="{{ route('players.edit',$player->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    </td>
                    <td>
                        <form action="{{ route('players.destroy', $player->id)}}" method="post">
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
