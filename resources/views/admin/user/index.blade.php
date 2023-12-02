@extends('layouts.app')
@section('title', 'User')

@section('content')
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
      <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> @yield('title')</h4>
<div class="card">
    <h5 class="card-header">Data @yield('title')</h5>
    <div class="row mt-0">
        <div class="col-12 col-md-12">
            <div class="card-body mb-0">
                <div class="input-group-prepend">
                  @can('users.create')
                  <a href="{{ route('admin.user.create') }}" class="btn btn-primary mb-2 mt-0"><i class='bx bx-plus-circle' ></i> Tambah</a>
                  @endcan
                </div>
                <form action="{{ route('admin.user.index') }}" method="GET">
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="q"
                                   placeholder="cari berdasarkan nama user">
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
              <th class="text-white">Role</th>
              <th class="text-white" style="width: 15%">Action</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">
              @foreach ($users as $no => $user)
              <tr>
                  <td class="text-center"><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ ++$no + ($users->currentPage()-1) * $users->perPage() }}</strong></td>
                  <td>{{ $user->name }}</td>
                  <td>@if(!empty($user->getRoleNames()))
                    @foreach($user->getRoleNames() as $role)
                        <label class="badge rounded-pill bg-secondary">{{ $role }}</label>
                    @endforeach
                @endif</td>
                  <td>
                    @can('users.edit')
                    <a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-sm btn-warning">
                        <i class='bx bx-edit-alt' ></i>
                    </a>
                @endcan

                @can('users.delete')
                    <button onClick="Delete(this.id)" class="btn btn-sm btn-danger" id="{{ $user->id }}">
                        <i class='bx bx-trash' ></i>
                    </button>
                @endcan
                  </td>
              </tr>
              @endforeach

          </tbody>
        </table>
        <div style="text-align: center">
          {{ $users->links("vendor.pagination.bootstrap-5") }}
      </div>
</div>
    </div>
  </div>
    </div>
</div>

<script>
    //ajax delete
    function Delete(id)
        {
            var id = id;
            var token = $("meta[name='csrf-token']").attr("content");

            swal({
                title: "APAKAH KAMU YAKIN ?",
                text: "INGIN MENGHAPUS DATA INI!",
                icon: "warning",
                buttons: [
                    'TIDAK',
                    'YA'
                ],
                dangerMode: true,
            }).then(function(isConfirm) {
                if (isConfirm) {

                    //ajax delete
                    jQuery.ajax({
                        url: "/admin/user/"+id,
                        data:   {
                            "id": id,
                            "_token": token
                        },
                        type: 'DELETE',
                        success: function (response) {
                            if (response.status == "success") {
                                swal({
                                    title: 'BERHASIL!',
                                    text: 'DATA BERHASIL DIHAPUS!',
                                    icon: 'success',
                                    timer: 1000,
                                    showConfirmButton: false,
                                    showCancelButton: false,
                                    buttons: false,
                                }).then(function() {
                                    location.reload();
                                });
                            }else{
                                swal({
                                    title: 'GAGAL!',
                                    text: 'DATA GAGAL DIHAPUS!',
                                    icon: 'error',
                                    timer: 1000,
                                    showConfirmButton: false,
                                    showCancelButton: false,
                                    buttons: false,
                                }).then(function() {
                                    location.reload();
                                });
                            }
                        }
                    });

                } else {
                    return true;
                }
            })
        }
</script>
@endsection
