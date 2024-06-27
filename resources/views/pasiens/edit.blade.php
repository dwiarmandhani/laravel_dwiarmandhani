@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Pasien') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('pasiens.update', $pasien->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="nama_pasien">{{ __('Nama Pasien') }}</label>
                            <input id="nama_pasien" type="text" class="form-control @error('nama_pasien') is-invalid @enderror" name="nama_pasien" value="{{ $pasien->nama_pasien }}" required autofocus>
                            @error('nama_pasien')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="alamat">{{ __('Alamat') }}</label>
                            <input id="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{ $pasien->alamat }}" required>
                            @error('alamat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="no_telpon">{{ __('No Telepon') }}</label>
                            <input id="no_telpon" type="text" class="form-control @error('no_telpon') is-invalid @enderror" name="no_telpon" value="{{ $pasien->no_telpon }}" required>
                            @error('no_telpon')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="rumah_sakit_id">{{ __('Rumah Sakit') }}</label>
                            <select id="rumah_sakit_id" class="form-control @error('rumah_sakit_id') is-invalid @enderror" name="rumah_sakit_id" required>
                                <option value="">Pilih Rumah Sakit</option>
                                @foreach ($rumah_sakits as $rumah_sakit)
                                    <option value="{{ $rumah_sakit->id }}" {{ $pasien->rumah_sakit_id == $rumah_sakit->id ? 'selected' : '' }}>{{ $rumah_sakit->nama_rumah_sakit }}</option>
                                @endforeach
                            </select>
                            @error('rumah_sakit_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
