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
                <div class="card-header">{{ __('E-Sport Player Database') }}</div>

                <div class="card-body">
                    <a href="{{ route('player.create') }}" type="button" class="btn btn-success rounded-3">+ Tambah Data</a>
                    <a href="{{ route('player.bin') }}" type="button" class="btn btn-danger rounded-3 ">Trash Data Player</a>
                    <a href="{{ route('team.index') }}" type="button" class="btn btn-outline-dark rounded-3">Halaman Team</a>
                    <a href="{{ route('divisi.index') }}" type="button" class="btn btn-outline-dark rounded-3">Halaman Divisi</a>


<table class="table table-hover mt-3">
    <thead>
      <tr>
        <th>No. </th>
        <th>ID Player</th>
        <th>Nickname</th>
        <th>Role</th>
        <th>ID Team </th>
        <th>ID Divisi</th>
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
                <td>{{ $player->ID_TEAM }}</td>
                <td>{{ $player->ID_DIVISI }}</td>

                <td>
                <div class="d-grid gap-1">
                    <a href="{{ route('player.edit', $player->ID_PLAYER) }}" type="button" class="btn btn-outline-success">EDIT</a>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#softhapusModal{{ $player->ID_PLAYER }}">
                        SOFT DELETE
                    </button>

                    <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#hapusModal{{ $player->ID_PLAYER }}">
                        DELETE
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="hapusModal{{ $player->ID_PLAYER }}" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="hapusModalLabel">Konfirmasi</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form method="POST" action="{{ route('player.delete', $player->ID_PLAYER) }}">
                                    @csrf
                                    <div class="modal-body">
                                        Apakah anda yakin ingin menghapus permanen data {{ $player->nickname}} ini?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary">Lanjutkan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                    <!--soft-->
                    <div class="modal fade" id="softhapusModal{{ $player->ID_PLAYER }}" tabindex="-1" aria-labelledby="softhapusModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="softhapusModalLabel">Konfirmasi</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form method="POST" action="{{ route('player.softdelete', $player->ID_PLAYER )}}">
                                    @csrf
                                    <div class="modal-body">
                                        Apakah anda yakin ingin menghapus data {{ $player->nickname }}?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary">Lanjutkan</button>
                                    </div>
                                </form>
                            </div>
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