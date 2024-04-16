
@extends('master.main')
@section('content')


<main id="main" class="main">

    <div class="pagetitle">
      <h1>Edit Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/admin">Koperasi</a></li>
          <li class="breadcrumb-item"><a href="/admin/profile">Profile Admin</a></li>
          <li class="breadcrumb-item active">Edit Profile</li>
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
        <!-- Edit akun admin -->
        <form class="row g-3 mt-1" method="POST" action="/admin/profile/{{ request()->user()->id }}" enctype="multipart/form-data">
            @csrf
            @method('put')
          <div>
            <h5 class="card-title">Foto Profile</h5>
          </div>

          <div class="card-body profile-card d-flex flex-column align-items-center">
            <img src="/storage/{{ request()->user()->buyer_photo }}" alt="Profile" class="rounded-circle" height="200">
          </div>



          <div>
            <h5 class="card-title">Data Admin</h5>
          </div>
            <!-- Edit akun admin -->
          <div class="col-12">
            <div class="col-12 mb-4">
              <div class="form-floating">
                <input type="text" class="form-control" id="floatingPhone" placeholder="Your Phone" name="phone" required value="{{ request()->user()->phone }}">
                <label for="floatingPhone">Nomor HP</label>
              </div>
            </div>
            <div class="col-12 mb-4">
              <div class="form-floating">
                <textarea class="form-control" placeholder="Address" id="floatingTextarea" style="height: 100px;" name="address" required >{{ request()->user()->address }}</textarea>
                <label for="floatingTextarea">Alamat</label>
              </div>
            </div>
            <div class="col-12 mb-4">
                <label for="floatingPhoto">Foto Profil (*kosongkan jika tidak ingin mengganti foto)</label>
                <input type="file" class="form-control" id="floatingPhoto" placeholder="Ganti foto profil" name="buyer_photo">
            </div>

          </div>


          <div class="text-center m-4">
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
          </div>
        </form><!-- Edit akun admin -->


      </div>
    </div>


  </main><!-- End #main -->


@endsection
