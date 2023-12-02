@extends('layouts.app')
@section('title', 'Tambah User')

@section('content')
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
      <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> @yield('title')</h4>
      <div class="card">
        <h5 class="card-header">Data @yield('title')</h5>
        <div class="card-body">
            <form action="{{ route('admin.user.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
              <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Nama User</label>
                <input type="text" class="form-control @error('name') is-invalid
                @enderror" name="name" id="basic-default-fullname" placeholder="masukkan nama user">
                @error('name')
                <div class="alert alert-danger alert-dismissible mt-1" role="alert">
                    {{ $message }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                @enderror
              </div>
              <div class="mb-3">
                <label class="form-label" for="basic-default-email">Email</label>
                <input type="email" class="form-control @error('email') is-invalid
                @enderror" name="email" id="basic-default-email" placeholder="email@example.com">
                @error('email')
                <div class="alert alert-danger alert-dismissible mt-1" role="alert">
                    {{ $message }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                @enderror
              </div>
              <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-email">Password</label>
                        <div class="input-group input-group-merge">
                          <input type="password" id="basic-default-email" value="{{ old('password') }}" class="form-control @error('password') is-invalid
                          @enderror" name="password" placeholder="masukkan password" aria-label="john.doe" aria-describedby="basic-default-email2">
                        </div>
                        @error('password')
                        <div class="alert alert-danger alert-dismissible mt-1" role="alert">
                            {{ $message }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>
                        @enderror
                      </div>
                </div>
                <div class="col-6">

                      <div class="mb-3">
                        <label class="form-label" for="basic-default-phone">Konfirmasi Password</label>
                        <input type="password" id="basic-default-phone" name="password_confirmation" value="{{ old('password_confirmation') }}" class="form-control phone-mask" placeholder="masukkan konfirmasi password">
                      </div>
                </div>
              </div>
              <div class="mb-3">
                <label class="form-label" for="basic-default-message">Role</label>
                <div class="form-check mt-3">
                    @foreach ($roles as $role )
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="role[]" value="{{ $role->name }}" id="check-{{ $role->id }}">
                        <label class="form-check-label" for="check-{{ $role->id }}"> {{ $role->name }} </label>
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
