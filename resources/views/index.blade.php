@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('E-Sport Team Database') }}</div>

                <div class="card-body">

                    <form action={{ route('team.cari') }} method="GET" >
                        <input type="search" name="cariteam" placeholder="Cari Team/Player .." value="{{ Request::get('cariteam')}}">
                        <button class="btn btn-outline-primary" type="submit">Search </button>
                    </form>
                    <a href="{{ route('player.index') }}" type="button" class="btn btn-info rounded-3">Halaman Player</a>
                    <a href="{{ route('team.index') }}" type="button" class="btn btn-info rounded-3">Halaman Team</a>
                    <a href="{{ route('divisi.index') }}" type="button" class="btn btn-info rounded-3">Halaman Divisi</a>
                    
                    <table class="table table-hover mt-2">
                        <thead>
                          <tr>
                            <th>No. </th>
                            <th>ID </th>
                            <th>Nickname </th>
                            <th>Role</th>
                            <th>Divisi</th>
                            <th>Team</th>
                          </tr>
                        </thead>


                        <tbody>
                            @php $no = 1; @endphp
                            @foreach ($joins as $join)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $join->ID_PLAYER }}</td>
                                    <td>{{ $join->nickname }}</td>
                                    <td>{{ $join->roles }}</td>
                                    <td>{{ $join->nama_divisi }}</td>
                                    <td>{{ $join->nama_team }}</td>
                                    <td>

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



@if($message = Session::get('success'))
    <div class="alert alert-success mt-3" role="alert">
        {{ $message }}
    </div>
@endif

@stop

                                        {{-- <a href="" type="button" class="btn btn-warning rounded-3">Ubah</a>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal{{ $join->ID_PLAYER }}">
                                            Hapus
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="hapusModal{{ $join->ID_PLAYER }}" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="hapusModalLabel">Konfirmasi</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form method="POST" action="{{ route('player.delete', $join->ID_PLAYER) }}">
                                                        @csrf
                                                        <div class="modal-body">
                                                            Apakah anda yakin ingin menghapus id {{ $join->ID_PLAYER}} ini?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                            <button type="submit" class="btn btn-primary">Ya</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div> --}}