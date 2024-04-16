<?php $__env->startSection('content'); ?>



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
              <div class="col-lg-9 col-md-8"><?php echo e($transaction->user->buyer_id); ?></div>
            </div>

            <div class="row">
              <div class="col-lg-3 col-md-4 label">Nama Pembeli</div>
              <div class="col-lg-9 col-md-8"><?php echo e($transaction->user->buyer_name); ?></div>
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
                <p class="text-muted small"><?php echo e($transaction->created_at->diffForHumans()); ?></p>
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
                    <?php $__currentLoopData = $transaction->purchases; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $purchase): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <th scope="row"><?php echo e($loop->iteration); ?></th>
                        <td><?php echo e($purchase->product->name); ?></td>
                        <td><?php echo e($purchase->product->price); ?></td>
                        <td><?php echo e($purchase->amount); ?></td>
                        <td><?php echo e(formatRupiah($purchase->price_total)); ?></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
                <tfoot>
                    <tr class="table-light">
                        <th colspan="4">Jumlah Total</th>
                        <td class="table-secondary"><?php echo e(formatRupiah($transaction->price_transaction_total)); ?></td>
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

  <?php $__env->stopSection(); ?>

<?php echo $__env->make('master.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /media/yunus-febriansyah/DATA1/AppProject/laravel-apps/e-koperasi-web/resources/views/layouts/transactions/cash/show.blade.php ENDPATH**/ ?>