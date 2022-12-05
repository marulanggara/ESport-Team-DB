@extends('layouts.app')

@section('content')

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
        @foreach($errors->all() as $error)

            <li>{{ $error }}</li>

        @endforeach
        </ul>
    </div>
@endif
<div class="row justify-content-center">
<div class="card col-md-8">
	<div class="card-body">

        <h5 class="card-title fw-bolder mb-3">Ubah Data Divisi {{ $data->ID_DIVISI }}</h5>

		<form method="post" action="{{ route('divisi.update', $data->ID_DIVISI) }}">
			@csrf
            <div class="mb-3">
                <label for="ID_DIVISI" class="form-label">ID Divisi</label>
                <input type="text" class="form-control" id="ID_DIVISI" name="ID_DIVISI" value="{{ $data->ID_DIVISI }}">
            </div>
			<div class="mb-3 ">
                <label for="nama_divisi" class="form-label">Nama Divisi</label>
                <input type="text" class="form-control" id="nama_divisi" name="nama_divisi" value="{{ $data->nama_divisi }}">
            </div>
            <div class="mb-3 ">
                <label for="desc_divisi" class="form-label">Deskripsi </label>
                <input type="text" class="form-control" id="desc_divisi" name="desc_divisi" value="{{ $data->desc_divisi }}" style="height: 100px">
            </div>

			<div class="text-center">
				<input type="submit" class="btn btn-success" value="Ubah" />
			</div>
		</form>
	</div>
</div>
</div>


@stop