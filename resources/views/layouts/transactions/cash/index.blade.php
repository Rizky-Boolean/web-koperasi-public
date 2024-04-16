

@extends('master.main')
@section('content')



<main id="main" class="main">

    <div class="pagetitle">
      <h1>Tunai</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/admin">Koperasi</a></li>
          <li class="breadcrumb-item"><a href="/admin/transactions/cash">Transaksi</a></li>
          <li class="breadcrumb-item active">Tunai</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Data Transaksi Tunai</h5>

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
                    <th scope="col">Tanggal</th>
                    <th scope="col">Nama Pembeli</th>
                    <th scope="col">Total Bayar</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($transactions as $transaction)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $transaction->created_at->diffForHumans() }}</td>
                        <td>{{ $transaction->user->buyer_name }}</td>
                        <td>{{ formatRupiah($transaction->price_transaction_total) }}</td>
                        <td class="align-middle text-center">
                        <div class="btn-group" role="group" aria-label="Basic outlined example">
                            <a href="/admin/transactions/cash/{{ $transaction->id }}" type="button" class="btn btn-outline-info"  >Detail</a>
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
