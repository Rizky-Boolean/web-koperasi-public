<?php $__env->startSection('content'); ?>


<main id="main" class="main">

    <div class="pagetitle">
      <h1>Produk</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/admin">Koperasi</a></li>
          <li class="breadcrumb-item active">Produk</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Data Produk Dijual</h5>
              <div class="d-flex justify-content-end">
                <a href="/admin/products/create" class="btn btn-primary">Tambah Produk Baru</a>
              </div>

              <?php if(session('success')): ?>
              <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                <i class="bi bi-check-circle me-1"></i>
                <?php echo e(session('success')); ?>

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              <?php endif; ?>

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">No.</th>
                    <th scope="col">ID</th>
                    <th scope="col">Nama Produk</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Stok</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <th scope="row"><?php echo e($loop->iteration); ?></th>
                      <td><?php echo e($product->product_number); ?></td>
                      <td><?php echo e($product->name); ?></td>
                      <td><?php echo e(formatRupiah($product->price)); ?></td>
                      <td><?php echo e($product->stock); ?></td>
                      <td class="align-middle text-center">
                        <div class="btn-group" role="group" aria-label="Basic outlined example">
                            <a href="/admin/products/<?php echo e($product->id); ?>" type="button" class="btn btn-outline-info"  >Detail</a>
                            
                            <a href="/admin/products/<?php echo e($product->id); ?>/edit" type="button" class="btn btn-outline-warning">Edit</a>
                            <form action="/admin/products/<?php echo e($product->id); ?>" method="POST" onsubmit="return confirm('Yakin mau HAPUS data ini?')">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('delete'); ?>
                                <button type="submit" class="btn btn-outline-danger rounded-0 rounded-end">Hapus</button>
                            </form>
                        </div>
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

<?php echo $__env->make('master.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /media/yunus-febriansyah/DATA1/AppProject/laravel-apps/e-koperasi-web/resources/views/layouts/products/index.blade.php ENDPATH**/ ?>