@extends('layouts.app')

@section('content')

@if ($message = Session::get('success'))
<div class="alert alert-success mt-3" role="alert">
    {{ $message }}
</div>
@endif

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Trash Data Player') }}</div>

                <div class="card-body">

                    <table class="table table-hover mt-2">
                        <thead>
                            <tr>
                                <th>No. </th>
                                <th>ID </th>
                                <th>Nickname </th>
                                <th>Role </th>
                            </tr>
                        </thead>


                        <tbody>
                            @php $no = 1; @endphp
                            @foreach ($players as $player)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $player->ID_PLAYER }}</td>
                                    <td>{{ $player->nickname }}</td>
                                    <td>{{ $player->roles }}</td>
                                    <td>
                                        <a href="{{ route('player.restore', $player->ID_PLAYER) }}" type="button"
                                            class="btn btn-success rounded-3">Pulihkan</a>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <a href="{{ route('player.index') }}" type="button" class="btn btn-primary col-3">Back</a>

                </div>
            </div>
        </div>
    </div>
</div>

@stop