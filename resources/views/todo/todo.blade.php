@extends('layouts.admin.app')

@section('title', 'Catatan')

@section('content')
    <div class="m-3">
        <a href="/todo/create" class="btn btn-success">Tambah Todo</a>
    </div>

   
    <table  class="table" >
        <thead  class="table-light">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Kategori</th>
                <th scope="col">Nama</th>
                <th scope="col">Email</th>
                <th scope="col">Judul</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($todos as $value)
                <tr>
                    <th scope="row">{{ $value->id }}</th>
                    <td>{{ $value->category }}</td>
                    <td>{{ $value->name }}</td>
                    <td>{{ $value->email }}</td>
                    <td>{{ $value->title }}</td>
                    <td>{{ $value->description }}</td>

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
