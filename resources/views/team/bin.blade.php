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
                <div class="card-header">{{ __('Trash Data Team') }}</div>

                <div class="card-body">

                    <table class="table table-hover mt-2">
                        <thead>
                          <tr>
                            <th>No. </th>
                            <th>ID </th>
                            <th>Nama </th>
                            <th>Tahun Dibentuk </th>
                          </tr>
                        </thead>


                        <tbody>
                            @php $no = 1; @endphp
                            @foreach ($teams as $team)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $team->ID_TEAM }}</td>
                                    <td>{{ $team->nama_team }}</td>
                                    <td>{{ $team->tahun_dibentuk }}</td>

                                    <td>
                                        <a href="{{ route('team.restore', $team->ID_TEAM) }}" type="button"
                                            class="btn btn-success rounded-3">Pulihkan</a>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                    <a href="{{ route('team.index') }}" type="button" class="btn btn-primary col-3">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>

@stop