

@extends('master.main')
@section('content')



<main id="main" class="main">

    <div class="pagetitle">
      <h1>Detail Transaksi Tunai</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/admin">Koperasi</a></li>
          <li class="breadcrumb-item"><a href="/admin/transactions/cash">Transaksi</a></li>
          <li class="breadcrumb-item"><a href="/admin/transactions/cash">Tunai</a></li>
          <li class="breadcrumb-item active">Detail Transaksi Tunai</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="card">
        <div class="card-body">

          <h5 class="card-title mb-3 mt-3">Info Pembeli</h5>


          <div class="tab-pane fade show active profile-overview" id="profile-overview">

            <div class="row ">
              <div class="col-lg-3 col-md-4 label ">ID Pembeli</div>
              <div class="col-lg-9 col-md-8">{{ $transaction->user->buyer_id }}</div>
            </div>

            <div class="row">
              <div class="col-lg-3 col-md-4 label">Nama Pembeli</div>
              <div class="col-lg-9 col-md-8">{{ $transaction->user->buyer_name }}</div>
            </div>

            <div class="row">
              <div class="col-lg-3 col-md-4 label">Transaksi</div>
              <div class="col-lg-9 col-md-8">Tunai</div>
            </div>


          </div><!-- Detail Pembeli -->


        </div>
      </div>
    </section>

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body m-2">
              <div class="mb-3 mt-3">
                <h5 class="fw-bold">Detail Beli</h5>
                <p class="text-muted small">{{ $transaction->created_at->diffForHumans() }}</p>
              </div>
              <!-- Table with stripped rows -->
              <table class="table">
                <thead>
                  <tr class="table-light">
                    <th scope="col">No.</th>
                    <th scope="col">Nama Produk</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Qty</th>
                    <th scope="col">Total Harga</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($transaction->purchases as $purchase)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $purchase->product->name }}</td>
                        <td>{{ $purchase->product->price }}</td>
                        <td>{{ $purchase->amount }}</td>
                        <td>{{ formatRupiah($purchase->price_total) }}</td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr class="table-light">
                        <th colspan="4">Jumlah Total</th>
                        <td class="table-secondary">{{ formatRupiah($transaction->price_transaction_total) }}</td>
                        </td>
                    </tr>
                </tfoot>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  @endsection
