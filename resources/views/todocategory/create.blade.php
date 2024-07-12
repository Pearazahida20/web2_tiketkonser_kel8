@extends('layouts.admin.app')

@section('title', 'Buat Catatan')

@section('content')
<form method="POST" action="/todocategory/store">
    @csrf
    <div class="mb-3">
      <label for="category" class="form-label">Kategori Catatan</label>
      <input type="text" class="form-control" id="category" name="category">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection

