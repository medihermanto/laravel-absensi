@extends('layouts.app')
@section('title', 'Permission')

@section('content')
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
      <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> @yield('title')</h4>
<div class="card">
    <h5 class="card-header">Data @yield('title')</h5>
    <div class="row">
        <div class="col-12">
            <div class="card-body mb-0">
                <form action="{{ route('admin.permission.index') }}" method="GET">
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="q"
                                   placeholder="cari berdasarkan nama permissions">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-primary"><i class='bx bx-search-alt' ></i> CARI
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<div class="card-body">
    <div class="table-responsive text-nowrap">
        <table class="table table-striped">
          <thead class="table-dark">
            <tr>
              <th class="text-white text-center" style="width:10%">No</th>
              <th class="text-white">Nama User</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">
              @foreach ($permissions as $no => $permission)
              <tr>
                  <td class="text-center"><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ ++$no + ($permissions->currentPage()-1) * $permissions->perPage() }}</strong></td>
                  <td>{{ $permission->name }}</td>
              </tr>
              @endforeach

          </tbody>
        </table>
        <div style="text-align: center">
          {{ $permissions->links("vendor.pagination.bootstrap-5") }}
      </div>
</div>
    </div>
  </div>
    </div>
</div>

@endsection
