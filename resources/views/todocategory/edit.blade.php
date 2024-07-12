@extends('layouts.admin.app')

@section('title', 'Ubah Kategori Catatan')

@section('content')
<form method="POST" action="/todocategory/update/{{$category->id}}">
    @csrf
    <div class="mb-3">
      <label for="category" class="form-label">Judul</label>
      <input type="text" class="form-control" id="category" name="category" value="{{$category->category}}">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection
