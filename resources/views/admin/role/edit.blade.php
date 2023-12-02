@extends('layouts.app')
@section('title', 'Ubah Role')

@section('content')
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
      <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> @yield('title')</h4>
      <div class="card">
        <h5 class="card-header">Data @yield('title')</h5>
        <div class="card-body">
            <form action="{{ route('admin.role.update', $role->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
              <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Nama Role</label>
                <input type="text" class="form-control @error('name') is-invalid
                @enderror" name="name" id="basic-default-fullname" value="{{ old('name', $role->name) }}" placeholder="masukkan nama role">
                @error('name')
                <div class="alert alert-danger alert-dismissible mt-1" role="alert">
                    {{ $message }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                @enderror
              </div>
              <div class="mb-3">
                <label class="form-label" for="basic-default-message">Permissions</label>
                <div class="form-check mt-3">
                    @foreach ($permissions as $permission )
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="permission[]" value="{{ $permission->name }}" id="check-{{ $permission->id }}">
                        <label class="form-check-label" for="check-{{ $permission->id }}"> {{ $permission->name }} </label>
                    </div>
                    @endforeach
                  </div>
              </div>
              <button type="submit" class="btn btn-primary"> <i class='bx bx-save' ></i> Simpan</button>
            </form>
          </div>
      </div>
    </div>
</div>

@endsection
