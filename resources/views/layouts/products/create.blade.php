

@extends('master.main')
@section('content')



<main id="main" class="main">

    <div class="pagetitle">
      <h1>Tambah Produk</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/admin">Koperasi</a></li>
          <li class="breadcrumb-item"><a href="/admin/product">Produk</a></li>
          <li class="breadcrumb-item active">Tambah Produk</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->


    <div class="card">
      <div class="card-body">

        <h5 class="card-title">Tambah Data Produk</h5>
        <span class="text-muted small pt-2 ps-1">*Data produk adalah semua produk yang dijual di koperasi</span>
        @if ($errors->any())
            <div class="alert alert-danger mt-3">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <!-- Buat Akun Baru -->
        <form class="row g-3 mt-1" method="POST" action="/admin/products">
            @csrf
            <div class="col-12">
                <div class="col-12 mb-4">
                <div class="form-floating">
                    <input type="number" class="form-control" id="floatingId" name="product_number" placeholder="ID Produk" required>
                    <label for="floatingName">ID Produk</label>
                </div>
                </div>
                <div class="col-md-12 mb-4">
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingName" name="name" placeholder="Nama Produk" required>
                    <label for="floatingName">Nama Produk</label>
                </div>
                </div>

                <div class="col-md-12 mb-4">
                    <div class="form-floating">
                        <input type="number" class="form-control" id="floatingStock" name="stock" placeholder="Stok Terseedia" required>
                        <label for="floatingName">Stok tersedia</label>
                    </div>
                </div>

                <div class="col-md-12 mb-4">
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingUnit" name="unit" placeholder="Satuan" required>
                    <label for="floatingName">Satuan</label>
                </div>
                </div>

                <div class="input-group mb-4">
                <span class="input-group-text" style="height: 55px;">Rp</span>
                <input type="number" class="form-control" aria-label="Dollar amount (with dot and two decimal places)" name="price" placeholder="Harga Satuan" required>
                </div>

            </div>

            <div class="text-center m-4">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>


      </div>
    </div>

  </main><!-- End #main -->

  @endsection
