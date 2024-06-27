@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Detail Rumah Sakit</div>

                <div class="card-body">
                    <div class="form-group">
                        <strong>Nama Rumah Sakit:</strong>
                        {{ $rumahSakit->nama_rumah_sakit }}
                    </div>
                    <div class="form-group">
                        <strong>Alamat:</strong>
                        {{ $rumahSakit->alamat }}
                    </div>
                    <div class="form-group">
                        <strong>Email:</strong>
                        {{ $rumahSakit->email }}
                    </div>
                    <div class="form-group">
                        <strong>Telepon:</strong>
                        {{ $rumahSakit->telepon }}
                    </div>
                    <a href="{{ route('rumah_sakits.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
