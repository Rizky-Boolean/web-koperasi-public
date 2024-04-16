
@extends('master.main')
@section('content')


<main id="main" class="main">

    <div class="pagetitle">
      <h1>Ganti Password Admin</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/admin">Koperasi</a></li>
          <li class="breadcrumb-item active">Ganti Password Admin</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->


    <div class="card">
      <div class="card-body">

        @if ($errors->any())
        <div class="alert alert-danger mt-3">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @if (session('failed'))
          <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
            <i class="bi bi-x-circle me-1"></i>
            {{ session('failed') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif

        <!-- Buat Akun Baru -->
        <form class="row g-3 mt-1" action="/admin/change-password" method="POST">
            @csrf
            @method('put')

          <div class="col-md-12 mb-3">
            <div class="form-floating">
              <input type="password" class="form-control" id="floatingOldPassword" name="old_password" placeholder="Your old password">
              <label for="floatingOldPassword">Passsword Lama</label>
            </div>
          </div>

          <div class="col-md-12 mb-3">
            <div class="form-floating">
              <input type="password" class="form-control" id="floatingNewPassword" name="new_password" placeholder="Your new password">
              <label for="floatingNewPassword">Passsword Baru</label>
            </div>
          </div>

          <div class="col-md-12 mb-3">
            <div class="form-floating">
              <input type="password" class="form-control" id="floatingRepeatPassword" name="repeat_password" placeholder="Repeat your new password">
              <label for="floatingRepeatPassword">Ulangi Passsword Baru</label>
            </div>
          </div>

          <div class="text-center m-4">
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
          </div>
        </form><!-- Buat Akun Baru -->


      </div>
    </div>

  </main><!-- End #main -->


@endsection
