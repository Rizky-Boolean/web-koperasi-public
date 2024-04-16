

@extends('master.main')
@section('content')



<main id="main" class="main">

    <div class="pagetitle">
      <h1>Laporan Bulanan</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/admin">Koperasi</a></li>
          <li class="breadcrumb-item active">Laporan Bulanan</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <section class="section mt-2 mb-2">
                <form action="/admin/reports" method="GET">
                    <div class="row">
                    <div class="col-lg-7">
                        <h5 class="fw-bold mt-2 mb-2">Laporan Bulan</h5>
                    </div>
                    <div class="col-lg-2">
                        <select class="form-select" name="month">
                            <option value="01" {{ request('month') == '01' ? 'selected': '' }}>Januari</option>
                            <option value="02" {{ request('month') == '02' ? 'selected': '' }}>Februari</option>
                            <option value="03" {{ request('month') == '03' ? 'selected': '' }}>Maret</option>
                            <option value="04" {{ request('month') == '04' ? 'selected': '' }}>April</option>
                            <option value="05" {{ request('month') == '05' ? 'selected': '' }}>Mei</option>
                            <option value="06" {{ request('month') == '06' ? 'selected': '' }}>Juni</option>
                            <option value="07" {{ request('month') == '07' ? 'selected': '' }}>Juli</option>
                            <option value="08" {{ request('month') == '08' ? 'selected': '' }}>Agustus</option>
                            <option value="09" {{ request('month') == '09' ? 'selected': '' }}>September</option>
                            <option value="10" {{ request('month') == '10' ? 'selected': '' }}>Oktober</option>
                            <option value="11" {{ request('month') == '11' ? 'selected': '' }}>November</option>
                            <option value="12" {{ request('month') == '12' ? 'selected': '' }}>Desember</option>
                        </select>
                    </div>
                    <div class="col-lg-2">
                        <select class="form-select" name="year">
                            @for( $year = getYear(); $year >= getYear() - 10; $year-- )
                            <option value="{{ $year }}"  {{ request('year') == $year ? 'selected': '' }}>{{ $year }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="col-lg-1">
                        <button type="submit" class="btn btn-primary">Terapkan</button>
                    </div>
                    </div>
                </form>
              </section>

              <!-- Table with stripped rows -->
              <table class="table">
                <thead>
                  <tr class="table-light">
                    <th scope="col">No.</th>
                    <th scope="col">Produk</th>
                    <th scope="col">Stok</th>
                    <th scope="col">Terjual</th>
                    <th scope="col">Terambil</th>
                    <th scope="col">Tunai</th>
                    <th scope="col">Kredit</th>
                  </tr>
                </thead>
                <tbody>
                    @php $cashTotal = 0; $creditTotal = 0; @endphp
                    @foreach ($products as $product)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->stock . ' ' . $product->unit }}</td>
                        <td>{{ sumCashAmountFromPurchases($product->purchases) . ' ' . $product->unit }}</td>
                        <td>{{ sumCreditAmountFromPurchases($product->purchases) . ' ' . $product->unit }}</td>
                        <td>{{ formatRupiah(sumCashPriceFromPurchases($product->purchases)) }}</td>
                        <td>{{ formatRupiah(sumCreditPriceFromPurchases($product->purchases)) }}</td>
                    </tr>
                    @php
                        $cashTotal += sumCashPriceFromPurchases($product->purchases);
                        $creditTotal += sumCreditPriceFromPurchases($product->purchases);
                    @endphp
                    @endforeach

                </tbody>
                <tfoot>
                    <tr class="table-light">
                        <th colspan="5">Uang Diterima</th>
                        <td class="table-secondary">{{ formatRupiah($cashTotal) }}</td>
                      </tr>

                      <tr class="table-light">
                        <th colspan="6">Uang Belum Diterima</th>
                        <td class="table-secondary">{{ formatRupiah($creditTotal) }}</td>
                      </tr>
                </tfoot>
              </table>
              <!-- End Table with stripped rows -->
              <div class="text-center pt-4">
                <a href="/admin/reports/print?month={{ request('month') }}&year={{ request('year') }}" target="_blank" class="btn btn-success">Unduh Laporan Ini</a>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->


  @endsection
