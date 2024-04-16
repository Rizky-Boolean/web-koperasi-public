<?php $__env->startSection('content'); ?>



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
                            <option value="01" <?php echo e(request('month') == '01' ? 'selected': ''); ?>>Januari</option>
                            <option value="02" <?php echo e(request('month') == '02' ? 'selected': ''); ?>>Februari</option>
                            <option value="03" <?php echo e(request('month') == '03' ? 'selected': ''); ?>>Maret</option>
                            <option value="04" <?php echo e(request('month') == '04' ? 'selected': ''); ?>>April</option>
                            <option value="05" <?php echo e(request('month') == '05' ? 'selected': ''); ?>>Mei</option>
                            <option value="06" <?php echo e(request('month') == '06' ? 'selected': ''); ?>>Juni</option>
                            <option value="07" <?php echo e(request('month') == '07' ? 'selected': ''); ?>>Juli</option>
                            <option value="08" <?php echo e(request('month') == '08' ? 'selected': ''); ?>>Agustus</option>
                            <option value="09" <?php echo e(request('month') == '09' ? 'selected': ''); ?>>September</option>
                            <option value="10" <?php echo e(request('month') == '10' ? 'selected': ''); ?>>Oktober</option>
                            <option value="11" <?php echo e(request('month') == '11' ? 'selected': ''); ?>>November</option>
                            <option value="12" <?php echo e(request('month') == '12' ? 'selected': ''); ?>>Desember</option>
                        </select>
                    </div>
                    <div class="col-lg-2">
                        <select class="form-select" name="year">
                            <?php for( $year = getYear(); $year >= getYear() - 10; $year-- ): ?>
                            <option value="<?php echo e($year); ?>"  <?php echo e(request('year') == $year ? 'selected': ''); ?>><?php echo e($year); ?></option>
                            <?php endfor; ?>
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
                    <?php $cashTotal = 0; $creditTotal = 0; ?>
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <th scope="row"><?php echo e($loop->iteration); ?></th>
                        <td><?php echo e($product->name); ?></td>
                        <td><?php echo e($product->stock . ' ' . $product->unit); ?></td>
                        <td><?php echo e(sumCashAmountFromPurchases($product->purchases) . ' ' . $product->unit); ?></td>
                        <td><?php echo e(sumCreditAmountFromPurchases($product->purchases) . ' ' . $product->unit); ?></td>
                        <td><?php echo e(formatRupiah(sumCashPriceFromPurchases($product->purchases))); ?></td>
                        <td><?php echo e(formatRupiah(sumCreditPriceFromPurchases($product->purchases))); ?></td>
                    </tr>
                    <?php
                        $cashTotal += sumCashPriceFromPurchases($product->purchases);
                        $creditTotal += sumCreditPriceFromPurchases($product->purchases);
                    ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </tbody>
                <tfoot>
                    <tr class="table-light">
                        <th colspan="5">Uang Diterima</th>
                        <td class="table-secondary"><?php echo e(formatRupiah($cashTotal)); ?></td>
                      </tr>

                      <tr class="table-light">
                        <th colspan="6">Uang Belum Diterima</th>
                        <td class="table-secondary"><?php echo e(formatRupiah($creditTotal)); ?></td>
                      </tr>
                </tfoot>
              </table>
              <!-- End Table with stripped rows -->
              <div class="text-center pt-4">
                <a href="/admin/reports/print?month=<?php echo e(request('month')); ?>&year=<?php echo e(request('year')); ?>" target="_blank" class="btn btn-success">Unduh Laporan Ini</a>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->


  <?php $__env->stopSection(); ?>

<?php echo $__env->make('master.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /media/yunus-febriansyah/DATA1/AppProject/laravel-apps/e-koperasi-web/resources/views/layouts/reports/index.blade.php ENDPATH**/ ?>