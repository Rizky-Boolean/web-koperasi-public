

@extends('master.main')
@section('content')



<main id="main" class="main">

    <div class="pagetitle">
      <h1>Profile Admin</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/admin">Koperasi</a></li>
          <li class="breadcrumb-item active">Profile Admin</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">

        <div class="card p-4">
          <div class="card-body">

            @if (session('success'))
              <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                <i class="bi bi-check-circle me-1"></i>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              @endif

            <!-- Detail Akun -->
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="/storage/{{ request()->user()->buyer_photo }}" alt="Profile" class="rounded-circle">
              <h2>{{ request()->user()->payer_name }}</h2>
              <h3>{{ request()->user()->role }}</h3>
            </div>

            <div class="tab-pane fade show active profile-overview" id="profile-overview">

              <div class="row">
                <div class="col-lg-3 col-md-4 label">ID Admin</div>
                <div class="col-lg-9 col-md-8">{{ request()->user()->payer_id }}</div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Nama Admin</div>
                <div class="col-lg-9 col-md-8">{{ request()->user()->payer_name }}</div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Jenis Kelamin</div>
                <div class="col-lg-9 col-md-8">{{ request()->user()->gender_buyer }}</div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Nomor HP</div>
                <div class="col-lg-9 col-md-8">{{ request()->user()->phone }}</div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Alamat</div>
                <div class="col-lg-9 col-md-8">{{ request()->user()->address }}</div>
              </div>


            </div><!-- Detail Akun -->
            <div class="text-center pt-4">
              <a href="/admin/profile/{{ request()->user()->id }}/edit" class="btn btn-warning">Edit Profile</a>
            </div>

          </div>
        </div>

    </section>



  </main><!-- End #main -->



@endsection
