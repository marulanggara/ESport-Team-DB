@extends('layouts.app')

@section('content')

@if($message = Session::get('success'))
    <div class="alert alert-success mt-3" role="alert">
        {{ $message }}
    </div>
@endif

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('E-Sport Team Database') }}</div>

                <div class="card-body">
                    <a href="{{ route('team.create') }}" type="button" class="btn btn-success rounded-3">+ Tambah Data</a>
                    <a href="{{ route('team.bin') }}" type="button" class="btn btn-danger rounded-3">Trash Team</a>



<table class="table table-hover mt-2">
    <thead>
      <tr>
        <th>No. </th>
        <th>ID </th>
        <th>Nama </th>
        <th>Tahun Dibentuk</th>
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
                    
                    <a href="{{ route('team.edit', $team->ID_TEAM) }}" type="button" class="btn btn-outline-success">EDIT</a>

                    <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#softhapusModal{{ $team->ID_TEAM }}">
                        SOFT DELETE
                    </button>

                    <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#hapusModal{{ $team->ID_TEAM }}">
                        DELETE
                    </button>

                    <div class="modal fade" id="hapusModal{{ $team->ID_TEAM }}" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="hapusModalLabel">Konfirmasi</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form method="POST" action="{{ route('team.delete', $team->ID_TEAM) }}">
                                    @csrf
                                    <div class="modal-body">
                                        Apakah anda yakin ingin menghapus permanen data {{ $team->nama_team}} ini?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Yes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>




                    <!--ini soft-->
                    <div class="modal fade" id="softhapusModal{{ $team->ID_TEAM }}" tabindex="-1" aria-labelledby="softhapusModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="softhapusModalLabel">Konfirmasi</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form method="POST" action="{{ route('team.softdelete', $team->ID_TEAM) }}">
                                    @csrf
                                    <div class="modal-body">
                                        Apakah anda yakin ingin menghapus data {{ $team->nama_team}} ini?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Yes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
                </div>
            </div>
        </div>
    </div>
</div>




@stop