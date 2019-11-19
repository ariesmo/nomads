@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"> Tambah Gallery</h1>
  </div>

  @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif

  <div class="card-shadow">
      <div class="card-body">
        <form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="travel_package">Paket Travel</label>
                <select name="travel_packages_id" id="travel_package" class="form-control" required>
                    <option value="">Pilih Paket Travel</option>
                    @foreach ($travel_packages as $item)
                        <option value="{{ $item->id }}">{{ $item->title }}</option>
                    @endforeach
                </select>
            </div>
            <br>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" id="image" placeholder="Image" class="form-control">
            </div>
            <button class="btn btn-primary btn-block" type="submit">Simpan</button>
        </form>
      </div>
  </div>

</div>
<!-- /.container-fluid -->
@endsection




