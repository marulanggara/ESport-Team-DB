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
                <div class="card-header">{{ __('E-Sport Divisi Database') }}</div>

                <div class="card-body">
                    <a href="{{ route('divisi.create') }}" type="button" class="btn btn-success rounded-3">+ Tambah Data</a>


<a href="{{ route('divisi.bin') }}" type="button" class="btn btn-danger rounded-3 ">Trash Divisi</a>


<table class="table table-hover mt-2">
    <thead>
      <tr>
        <th>No. </th>
        <th>ID </th>
        <th>Nama </th>
        <th>Deskripsi</th>
      </tr>
    </thead>


    <tbody>
        @php $no = 1; @endphp
        @foreach ($divisis as $divisi)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $divisi->ID_DIVISI }}</td>
                <td>{{ $divisi->nama_divisi }}</td>
                <td>{{ $divisi->desc_divisi }}</td>
                <td>
                <div class="d-grid gap-1">
                    <a href="{{ route('divisi.edit', $divisi->ID_DIVISI) }}" type="button" class="btn btn-outline-success">EDIT</a>

                    <!-- Button trigger modal -->

                        <i class=""></i>
                    <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#softhapusModal{{ $divisi->ID_DIVISI }}">
                       SOFT DELETE
                    </button>

                    <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#hapusModal{{ $divisi->ID_DIVISI }}">
                        DELETE
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="hapusModal{{ $divisi->ID_DIVISI }}" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="hapusModalLabel">Konfirmasi</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form method="POST" action="{{ route('divisi.delete', $divisi->ID_DIVISI) }}">
                                    @csrf
                                    <div class="modal-body">
                                        Apakah anda yakin ingin menghapus permanen data {{ $divisi->nama_divisi}} ini?
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
                    

                    <!--ini soft-->
                    <div class="modal fade" id="softhapusModal{{ $divisi->ID_DIVISI }}" tabindex="-1" aria-labelledby="softhapusModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="softhapusModalLabel">Konfirmasi</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form method="POST" action="{{ route('divisi.softdelete', $divisi->ID_DIVISI) }}">
                                    @csrf
                                    <div class="modal-body">
                                        Apakah anda yakin ingin menghapus data {{ $divisi->nama_divisi}} ini?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary">Lanjutkan</button>
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