<?php $__env->startSection('content'); ?>


<main id="main" class="main">

    <div class="pagetitle">
      <h1>Detail Transaksi Kredit</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/admin">Koperasi</a></li>
          <li class="breadcrumb-item"><a href="/admin/transactions/credit">Transaksi</a></li>
          <li class="breadcrumb-item"><a href="/admin/transactions/credit">Kredit</a></li>
          <li class="breadcrumb-item active">Detail Transaksi Kredit</li>
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
              <div class="col-lg-9 col-md-8"><?php echo e($user->buyer_id); ?></div>
            </div>

            <div class="row">
              <div class="col-lg-3 col-md-4 label">Nama Pembeli</div>
              <div class="col-lg-9 col-md-8"><?php echo e($user->buyer_name); ?></div>
            </div>

            <div class="row">
              <div class="col-lg-3 col-md-4 label">Jenis Kelamin Pembeli</div>
              <div class="col-lg-9 col-md-8"><?php echo e($user->gender_buyer); ?></div>
            </div>

            <div class="row">
              <div class="col-lg-3 col-md-4 label">Transaksi</div>
              <div class="col-lg-9 col-md-8">Kredit</div>
            </div>

            <hr class="divider">

            <div class="row">
              <div class="col-lg-3 col-md-4 label">ID Pembayar</div>
              <div class="col-lg-9 col-md-8"><?php echo e($user->payer_id); ?></div>
            </div>

            <div class="row">
              <div class="col-lg-3 col-md-4 label">Nama Pembayar</div>
              <div class="col-lg-9 col-md-8"><?php echo e($user->payer_name); ?></div>
            </div>

            <div class="row">
              <div class="col-lg-3 col-md-4 label">Nomor HP Pembayar</div>
              <div class="col-lg-9 col-md-8"><?php echo e($user->phone); ?></div>
            </div>

            <div class="row">
              <div class="col-lg-3 col-md-4 label">Alamat</div>
              <div class="col-lg-9 col-md-8"><?php echo e($user->address); ?></div>
            </div>


          </div><!-- Detail Pembeli -->


        </div>
      </div>
    </section>

    <?php for( $tgl = 1; $tgl <= getNowDayNumber(); $tgl++): ?>

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body m-2">
              <div class="mb-3 mt-3">
                <h5 class="fw-bold">Detail Kredit</h5>
                <p class="text-muted small"><?php echo e($tgl . '/' . getMonthNumber() . '/' . getYear()); ?></p>
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
                    <?php $total = 0; ?>
                    <?php $__currentLoopData = $user->transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if( getDayFromDate($transaction->created_at) == $tgl ): ?>
                        <?php $__currentLoopData = $transaction->purchases; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $purchase): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <th scope="row"><?php echo e($loop->iteration); ?></th>
                                <td><?php echo e($purchase->product->name); ?></td>
                                <td><?php echo e(formatRupiah($purchase->product->price)); ?></td>
                                <td><?php echo e($purchase->amount); ?></td>
                                <td><?php echo e(formatRupiah($purchase->price_total)); ?></td>
                            </tr>
                            <?php $total += $purchase->price_total; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <tr class="table-light">
                        <th colspan="4">Jumlah Total</th>
                        <td class="table-secondary"><?php echo e(formatRupiah($total)); ?></td>
                        </td>
                    </tr>
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>

    <?php endfor; ?>







    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body m-2">
              <div class="mb-3 mt-3">
                <h5 class="fw-bold">Total Tagihan Kredit</h5>
                <p class="text-muted small">Bulan ini</p>
              </div>
              <!-- Table with stripped rows -->
              <table class="table table-bordered border-warning">
                <thead>
                  <tr class="table-light border-warning">
                    <th scope="col">No.</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Jam</th>
                    <th scope="col">Total</th>
                  </tr>
                </thead>
                <tbody>
                    <?php $total = 0; ?>
                    <?php $__currentLoopData = $user->transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <th scope="row"><?php echo e($loop->iteration); ?></th>
                            <td><?php echo e($transaction->created_at->formatLocalized('%d %B %Y')); ?></td>
                            <td><?php echo e($transaction->created_at->format('H:i')); ?> WIB</td>
                            <td><?php echo e(formatRupiah($transaction->price_transaction_total)); ?></td>
                        </tr>
                        <?php $total+= $transaction->price_transaction_total; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
                <tfoot>
                    <tr class="table-light border-warning">
                        <th colspan="3">Total Tagihan Saat Ini</th>
                        <td class="table-warning"><?php echo e(formatRupiah($total)); ?></td>
                        </td>
                      </tr>
                </tfoot>
              </table>
              <!-- End Table with stripped rows -->
              <div class="text-center pt-4">
                <button type="submit" class="btn btn-warning">Konfirmasi Pembayaran</button>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->


  <?php $__env->stopSection(); ?>

<?php echo $__env->make('master.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /media/yunus-febriansyah/DATA1/AppProject/laravel-apps/e-koperasi-web/resources/views/layouts/transactions/credit/show.blade.php ENDPATH**/ ?>