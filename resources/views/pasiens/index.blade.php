@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h2>Data Pasien</h2>
            <a class="btn btn-success mb-2" href="{{ route('pasiens.create') }}">Tambah Pasien</a>

            <div class="row mb-3">
                <div class="col-lg-6">
                    <label for="rumah_sakit_filter" class="form-label">Filter berdasarkan Rumah Sakit:</label>
                    <select class="form-select" id="rumah_sakit_filter">
                        <option value="">Pilih Rumah Sakit</option>
                        @foreach ($rumah_sakits as $rumah_sakit)
                            <option value="{{ $rumah_sakit->id }}">{{ $rumah_sakit->nama_rumah_sakit }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pasien</th>
                        <th>Alamat</th>
                        <th>No Telepon</th>
                        <th>Rumah Sakit</th>
                        <th width="280px">Action</th>
                    </tr>
                </thead>
                <tbody id="pasiens_table_body">
                    @foreach ($pasiens as $pasien)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $pasien->nama_pasien }}</td>
                            <td>{{ $pasien->alamat }}</td>
                            <td>{{ $pasien->no_telpon }}</td>
                            <td>{{ $pasien->rumah_sakit->nama_rumah_sakit }}</td>
                            <td>
                                <a class="btn btn-info" href="{{ route('pasiens.show', $pasien->id) }}">Show</a>
                                <a class="btn btn-primary" href="{{ route('pasiens.edit', $pasien->id) }}">Edit</a>
                                <button class="btn btn-danger btn-delete" data-id="{{ $pasien->id }}">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('#rumah_sakit_filter').change(function() {
            var rumah_sakit_id = $(this).val();
            $.ajax({
                url: "{{ route('pasiens.filterByRumahSakit') }}",
                type: "GET",
                data: {
                    rumah_sakit_id: rumah_sakit_id
                },
                success: function(response) {
                    var html = '';
                    $.each(response, function(index, pasien) {
                        html += '<tr>' +
                            '<td>' + (index + 1) + '</td>' +
                            '<td>' + pasien.nama_pasien + '</td>' +
                            '<td>' + pasien.alamat + '</td>' +
                            '<td>' + pasien.no_telpon + '</td>' +
                            '<td>' + pasien.nama_rumah_sakit + '</td>' +
                            '<td>' +
                            '<a class="btn btn-info" href="{{ route('pasiens.show', '') }}/' + pasien.id + '">Show</a>' +
                            '<a class="btn btn-primary" href="{{ route('pasiens.edit', '') }}/' + pasien.id + '">Edit</a>' +
                            '<button class="btn btn-danger btn-delete" data-id="' + pasien.id + '">Delete</button>' +
                            '</td>' +
                            '</tr>';
                    });
                    $('#pasiens_table_body').html(html);
                }
            });
        });

        // Ajax delete handler
        $('#pasiens_table_body').on('click', '.btn-delete', function() {
            var pasien_id = $(this).data('id');
            if (confirm("Are you sure you want to delete this Pasien?")) {
                $.ajax({
                    url: "{{ url('pasiens') }}" + '/' + pasien_id,
                    type: "POST",
                    data: {
                        _method: 'DELETE',
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(data) {
                        alert('Pasien deleted successfully');
                        location.reload();
                    },
                    error: function(data) {
                        console.log('Error:', data);
                    }
                });
            }
        });
    });
</script>
@endsection
