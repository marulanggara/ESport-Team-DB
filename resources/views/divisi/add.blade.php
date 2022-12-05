@extends('layouts.app')

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
<div class="row justify-content-center"> 
<div class="card col-md-8">
        <div class="card-body">

            <h5 class="card-title fw-bolder mb-3">Tambah Divisi</h5>

            <form method="post" action="{{ route('divisi.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="ID_DIVISI" class="form-label">ID Divisi</label>
                    <input type="text" class="form-control" id="ID_DIVISI" name="ID_DIVISI">
                </div>
                <div class="mb-3">
                    <label for="nama_divisi" class="form-label">Nama Divisi</label>
                    <input type="text" class="form-control" id="nama_divisi" name="nama_divisi">
                </div>

                <div class="mb-3">
                    <label for="desc_divisi" class="form-label">Deskripsi Divisi</label>
                    <input type="text" class="form-control" id="desc_divisi" name="desc_divisi" style="height: 100px">
                </div>

                <div class="text-center">
                    <input type="submit" class="btn btn-primary" value="Tambah" />
                </div>
            </form>
        </div>
    </div>
</div>
    

@stop