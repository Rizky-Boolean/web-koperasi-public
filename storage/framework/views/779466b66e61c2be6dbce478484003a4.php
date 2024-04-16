<?php $__env->startSection('content'); ?>


<main id="main" class="main">

    <div class="pagetitle">
      <h1>Detail Produk</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/admin">Koperasi</a></li>
          <li class="breadcrumb-item"><a href="/admin/product">Produk</a></li>
          <li class="breadcrumb-item active">Detail Produk</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="card">
        <div class="card-body">

          <h5 class="card-title mb-3 mt-3">Detail Produk</h5>


          <div class="tab-pane fade show active profile-overview" id="profile-overview">

            <div class="row ">
              <div class="col-lg-3 col-md-4 label ">ID Produk</div>
              <div class="col-lg-9 col-md-8"><?php echo e($product->product_number); ?></div>
            </div>

            <div class="row">
              <div class="col-lg-3 col-md-4 label">Nama Produk</div>
              <div class="col-lg-9 col-md-8"><?php echo e($product->name); ?></div>
            </div>

            <div class="row">
              <div class="col-lg-3 col-md-4 label">Stok Tersedia</div>
              <div class="col-lg-9 col-md-8"><?php echo e($product->stock); ?></div>
            </div>

            <div class="row">
              <div class="col-lg-3 col-md-4 label">Satuan</div>
              <div class="col-lg-9 col-md-8"><?php echo e($product->unit); ?></div>
            </div>

            <div class="row">
              <div class="col-lg-3 col-md-4 label">Harga Satuan</div>
              <div class="col-lg-9 col-md-8"><?php echo e($product->price); ?></div>
            </div>



          </div><!-- Detail Produk -->
          <div class="text-center pt-4">
            <a href="/admin/products/<?php echo e($product->id); ?>/edit" class="btn btn-warning">Edit Data Produk</a>
            <form action="/admin/products/<?php echo e($product->id); ?>" method="POST" onsubmit="return confirm('Yakin mau HAPUS data ini?')" class="d-inline-block">
                <?php echo csrf_field(); ?>
                <?php echo method_field('delete'); ?>
                <button type="submit" class="btn btn-danger ">Hapus</button>
            </form>
          </div>

        </div>
      </div>
    </section>

    <section class="section profile">

        <div class="card p-4">
          <div class="card-body">

            <div style='text-align: center;'>
              <!-- insert your custom barcode setting your data in the GET parameter "data" -->
              <img alt='Barcode Generator TEC-IT'
                   src='https://barcode.tec-it.com/barcode.ashx?data=<?php echo e($product->product_number); ?>&code=Code128&translate-esc=on'/>
            </div>
            <div class="text-center pt-4">
                <a class="btn btn-success" href="https://barcode.tec-it.com/barcode.ashx?data=<?php echo e($product->product_number); ?>&amp;translate-esc=on&amp;imagetype=Jpg&amp;download=true" title="Unduh Barcode" target="_self" download="">
                    <span>Unduh Barcode</span>
                  </a>
            </div>

          </div>
        </div>

    </section>
  </main><!-- End #main -->


  <?php $__env->stopSection(); ?>

<?php echo $__env->make('master.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/mrizkyfadhilah/Documents/ASKRIPSI/app/e-koperasi-web/resources/views/layouts/products/show.blade.php ENDPATH**/ ?>