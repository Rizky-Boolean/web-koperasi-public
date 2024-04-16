


@extends('master.main')
@section('content')


<main id="main" class="main">

    <div class="pagetitle">
      <h1>Pengguna</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/admin">Koperasi</a></li>
          <li class="breadcrumb-item active">Pengguna</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Data Akun Pengguna</h5>
              <div class="d-flex justify-content-end">
                <a href="/admin/users/print" class="btn btn-success me-2">Generate ID Card</a>
                <a href="/admin/users/create" class="btn btn-primary">Tambah Akun Baru</a>
              </div>

              @if (session('success'))
              <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                <i class="bi bi-check-circle me-1"></i>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              @endif

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Nama Pembayar</th>
                    <th scope="col">Nama Pembeli</th>
                    <th scope="col">Nomor HP</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Peran</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                      <th scope="row">{{ $loop->iteration }}</th>
                      <td>{{ $user->buyer_name }}</td>
                      <td>{{ $user->payer_name }}</td>
                      <td>{{ $user->phone }}</td>
                      <td>{{ $user->user_category }}</td>
                      <td>{{ $user->role }}</td>
                      <td class="align-middle text-center">
                        <div class="btn-group" role="group" aria-label="Basic outlined example">
                            <a href="/admin/users/{{ $user->id }}" class="btn btn-outline-info">Detail</a>
                            {{-- <a href="#" class="btn btn-outline-success">Unduh</a> --}}
                            <a href="/admin/users/{{ $user->id }}/edit" class="btn btn-outline-warning">Edit</a>
                            <form action="/admin/users/{{ $user->id }}" method="POST" onsubmit="return confirm('Yakin mau HAPUS data ini?')">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-outline-danger rounded-0 rounded-end">Hapus</button>
                            </form>
                        </div>
                      </td>
                    </tr>
                    @endforeach

                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->


  @endsection
