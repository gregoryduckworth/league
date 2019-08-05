@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        {{ $team->name }}
        <a href="{{ url()->previous() }}" class="pull-right">Back</a>
    </div>
    <div class="card-body">
        <strong>Team Name:</strong><br />
        {{ $team->name }}<br />

        <strong>Contact Name:</strong><br />
        {{ $team->contact }}<br />
        <hr>
        <strong>Leagues:</strong><br />
        @foreach($team->leagues as $league)
            <label><a href="{{ route('leagues.show',$league->id) }}">{{ $league->name }}</a></label><br />
            <strong>Scorers:</strong><br />
            <table class="table" id="players">
            @foreach($team->players as $player)
                <tr>
                    <td>
                        <a href="{{ route('players.show', $player->id) }}">{{ $player->name }}</a>
                    </td>
                    <td>{{ $player->goals($league->id, $team->id) }}</td>
                </tr>
            @endforeach
            </table>
        @endforeach
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function () {
        $('#players').DataTable({
            "info": false,
            "lengthChange": false,
        });
    });

</script>
@endsection