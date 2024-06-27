@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Detail Pasien') }}</div>

                <div class="card-body">
                    <p><strong>Nama Pasien:</strong> {{ $pasien->nama_pasien }}</p>
                    <p><strong>Alamat:</strong> {{ $pasien->alamat }}</p>
                    <p><strong>No Telepon:</strong> {{ $pasien->no_telpon }}</p>
                    <p><strong>Rumah Sakit:</strong> {{ $pasien->rumah_sakit->nama_rumah_sakit }}</p>
                    <a class="btn btn-primary" href="{{ route('pasiens.index') }}">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
