@extends('layouts.admin.app')

@section('title', 'Kategori Catatan')

@section('content')
    <div class="m-3">
        <a href="/todocategory/create" class="btn btn-success">Tambah Todo</a>
    </div>


    <table class="table">
        <thead class="table-light">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nama</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($categories as $value)
                <tr>
                    <th scope="row">{{ $value->id }}</th>
                    <td>{{ $value->category }}</td>

                    <td>
                        <a href="/user/edit/{{ $value->id }}" class="btn btn-warning">Ubah</a>
                        <a href="/user/delete/{{ $value->id }}" class="btn btn-danger">Hapus</a>
                    </td>
                </tr>


                </div>
            @endforeach
        </tbody>
    </table>
@endsection
