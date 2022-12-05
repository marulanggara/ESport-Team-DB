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

            <h5 class="card-title fw-bolder mb-3">Tambah Player</h5>

            <form method="post" action="{{ route('player.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="ID_PLAYER" class="form-label">ID Player</label>
                    <input type="text" class="form-control" id="ID_PLAYER" name="ID_PLAYER">
                </div>

                
                <div class="mb-3">
                    <label for="nickname" class="form-label">Nickname</label>
                    <input type="text" class="form-control" id="nickname" name="nickname">
                </div>



                <div class="mb-3">
                    <label for="roles" class="form-label">Role </label>
                    <input type="text" class="form-control" id="roles" name="roles">
                </div>

                <div class="mb-3">
                    <label for="ID_TEAM" class="form-label">ID Team</label>
                    <!-- {{-- <input type="text" class="form-control" id="ID_TEAM" name="ID_TEAM"> --}} -->
                    <div class="form-group">
                        <select class="form-control" name="ID_TEAM">
                            @foreach ($teams as $team)
                                <option value="{{ $team->ID_TEAM }}">{{ $team->nama_team}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="ID_DIVISI" class="form-label">ID Divisi</label>
                    <!-- {{-- <input type="text" class="form-control" id="ID_DIVISI" name="ID_DIVISI"> --}} -->
                    <div class="form-group">
                        <select class="form-control" name="ID_DIVISI">
                            @foreach ($divisis as $divisi)
                                <option value="{{ $divisi->ID_DIVISI }}">{{ $divisi->nama_divisi}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="text-center">
                    <input type="submit" class="btn btn-primary" value="Tambah" />
                </div>
            </form>
        </div>
    </div>
</div>

@stop