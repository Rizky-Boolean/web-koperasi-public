<?php $__env->startSection('content'); ?>


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
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <th scope="row"><?php echo e($loop->iteration); ?></th>
                        <td><?php echo e($user->buyer_name); ?></td>
                        <td><?php echo e($user->payer_name); ?></td>
                        <td><?php echo e(formatRupiah(sumTotalFromTransaction($user->transactions))); ?></td>
                        <td class="align-middle text-center">
                            <a href="/admin/transactions/credit/<?php echo e($user->id); ?>" class="btn btn-outline-info">Detail</a>

                            <?php if( count( $user->transactions ) > 0 ): ?>
                            <form action="/admin/transactions/credit/<?php echo e($user->id); ?>" method="POST" onsubmit="return confirm('Yakin mau KONFIRMASI pembayaran tagihan ini?')" class="d-inline-block">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('put'); ?>
                                <button type="submit" class="btn btn-outline-warning rounded">Konfirmasi</button>
                            </form>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->


  <?php $__env->stopSection(); ?>

<?php echo $__env->make('master.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/mrizkyfadhilah/Documents/ASKRIPSI/app/e-koperasi-web/resources/views/layouts/transactions/credit/index.blade.php ENDPATH**/ ?>