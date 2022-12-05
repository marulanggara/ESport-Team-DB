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
                <div class="card-header">{{ __('Trash Data Divisi') }}</div>

                <div class="card-body">

                    <table class="table table-hover mt-2">
                        <thead>
                            <tr>
                                <th>No. </th>
                                <th>ID </th>
                                <th>Nama </th>
                                <th>Deskripsi </th>
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
                                        <a href="{{ route('divisi.restore', $divisi->ID_DIVISI) }}" type="button"
                                            class="btn btn-success rounded-3">Pulihkan</a>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <a href="{{ route('divisi.index') }}" type="button" class="btn btn-primary col-3">Back</a>

                </div>
            </div>
        </div>
    </div>
</div>

@stop