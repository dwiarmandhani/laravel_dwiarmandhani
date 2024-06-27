@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Rumah Sakit</div>

                <div class="card-body">
                    <a href="{{ route('rumah_sakits.create') }}" class="btn btn-primary mb-3">Tambah Rumah Sakit</a>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <table class="table table-bordered" id="rumahSakitsTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Rumah Sakit</th>
                                <th>Alamat</th>
                                <th>Email</th>
                                <th>Telepon</th>
                                <th width="280px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rumahSakits as $rumahSakit)
                                <tr id="rumah-sakit-{{ $rumahSakit->id }}">
                                    <td>{{ $rumahSakit->id }}</td>
                                    <td>{{ $rumahSakit->nama_rumah_sakit }}</td>
                                    <td>{{ $rumahSakit->alamat }}</td>
                                    <td>{{ $rumahSakit->email }}</td>
                                    <td>{{ $rumahSakit->telepon }}</td>
                                    <td>
                                        <a class="btn btn-info" href="{{ route('rumah_sakits.show', $rumahSakit->id) }}">Show</a>
                                        <a class="btn btn-primary" href="{{ route('rumah_sakits.edit', $rumahSakit->id) }}">Edit</a>
                                        <button class="btn btn-danger delete-btn" data-id="{{ $rumahSakit->id }}">Delete</button>
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
@endsection

@section('scripts')
<script>
$(document).ready(function() {
    $('.delete-btn').on('click', function() {
        var id = $(this).data('id');
        var token = $("meta[name='csrf-token']").attr("content");

        if (confirm("Are you sure you want to delete this Rumah Sakit?")) {
            $.ajax({
                url: '/rumah_sakits/' + id,
                type: 'DELETE',
                data: {
                    "id": id,
                    "_token": token,
                },
                success: function(response) {
                    // Menghapus baris tabel yang sesuai dengan ID yang dihapus
                    var row = document.getElementById('rumah-sakit-' + id);
                    row.parentNode.removeChild(row);
                },
                error: function(response) {
                    alert('Error: ' + response.responseText);
                }
            });
        }
    });
});
</script>
@endsection
