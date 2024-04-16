


@extends('master.main')
@section('content')


<main id="main" class="main">

    <div class="pagetitle">
      <h1>Detail Akun</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/admin">Koperasi</a></li>
          <li class="breadcrumb-item"><a href="/admin/users">Akun</a></li>
          <li class="breadcrumb-item active">Detail Akun</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">

        <div class="card p-4">
          <div class="card-body">

            @if (session('success'))
              <div class="alert alert-success alert-dismissible fade show mb-2" role="alert">
                <i class="bi bi-check-circle me-1"></i>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif

            <!-- Detail Akun -->
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="/storage/{{ $user->buyer_photo }}" alt="Profile" class="rounded-circle">
              <h2>{{ $user->payer_name }}</h2>
              <h3>{{ $user->role }}</h3>
            </div>

            <div class="tab-pane fade show active profile-overview" id="profile-overview">

              <div class="row ">
                <div class="col-lg-3 col-md-4 label ">ID Pembeli</div>
                <div class="col-lg-9 col-md-8">{{ $user->buyer_id }}</div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Nama Pembeli</div>
                <div class="col-lg-9 col-md-8">{{ $user->buyer_name }}</div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Jenis Kelamin Pembeli</div>
                <div class="col-lg-9 col-md-8">{{ $user->gender_buyer }}</div>
              </div>

              <hr class="divider">

              <div class="row">
                <div class="col-lg-3 col-md-4 label">ID Pembayar</div>
                <div class="col-lg-9 col-md-8">{{ $user->payer_id }}</div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Nama Pembayar</div>
                <div class="col-lg-9 col-md-8">{{ $user->payer_name }}</div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Nomor HP Pembayar</div>
                <div class="col-lg-9 col-md-8">{{ $user->phone }}</div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Alamat</div>
                <div class="col-lg-9 col-md-8">{{ $user->address }}</div>
              </div>


            </div><!-- Detail Akun -->
            <div class="text-center pt-4">
            <form action="/admin/users/{{ $user->id }}/reset-password" method="POST" onsubmit="return confirm('Yakin ingin mereset password?')" class="d-inline-block">
                @csrf
                @method('put')
                <button type="submit" class="btn btn-primary">Reset Password</button>
            </form>
              <a href="/admin/users/{{ $user->id }}/edit" class="btn btn-warning">Edit Akun</a>
              <form action="/admin/users/{{ $user->id }}" method="POST" onsubmit="return confirm('Yakin mau HAPUS data ini?')" class="d-inline-block">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger ">Hapus</button>
            </form>
            </div>

          </div>
        </div>

    </section>

    <section class="section profile">

        <div class="card p-4">
          <div class="card-body">

            <div style='text-align: center;'>
                <!-- insert your custom barcode setting your data in the GET parameter "data" -->
                <img alt='Barcode Generator TEC-IT'
                     src='https://barcode.tec-it.com/barcode.ashx?data={{ $user->buyer_id }}&code=Code128&translate-esc=on'/>
              </div>
              <div class="text-center pt-4">
                  <a class="btn btn-success" href="/admin/users/{{ $user->id }}/print">
                      <span>Print ID Card</span>
                    </a>
              </div>

          </div>
        </div>

    </section>

  </main><!-- End #main -->


  @endsection
