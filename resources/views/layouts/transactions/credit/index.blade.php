


@extends('master.main')
@section('content')


<main id="main" class="main">

    <div class="pagetitle">
      <h1>Kredit</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/admin">Koperasi</a></li>
          <li class="breadcrumb-item"><a href="/admin/transactions/credit">Transaksi</a></li>
          <li class="breadcrumb-item active">Kredit</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Data Transaksi Piutang</h5>


              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Nama Pembeli</th>
                    <th scope="col">Nama Pembayar</th>
                    <th scope="col">Total Tagihan</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $user->buyer_name }}</td>
                        <td>{{ $user->payer_name }}</td>
                        <td>{{ formatRupiah(sumTotalFromTransaction($user->transactions)) }}</td>
                        <td class="align-middle text-center">
                            <a href="/admin/transactions/credit/{{ $user->id }}" class="btn btn-outline-info">Detail</a>

                            @if( count( $user->transactions ) > 0 )
                            <form action="/admin/transactions/credit/{{ $user->id }}" method="POST" onsubmit="return confirm('Yakin mau KONFIRMASI pembayaran tagihan ini?')" class="d-inline-block">
                                @csrf
                                @method('put')
                                <button type="submit" class="btn btn-outline-warning rounded">Konfirmasi</button>
                            </form>
                            @endif
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
