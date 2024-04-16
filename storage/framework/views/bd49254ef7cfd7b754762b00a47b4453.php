<?php $__env->startSection('content'); ?>



<main id="main" class="main">

    <div class="pagetitle">
      <h1>Profile Admin</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/admin">Koperasi</a></li>
          <li class="breadcrumb-item active">Profile Admin</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">

        <div class="card p-4">
          <div class="card-body">

            <?php if(session('success')): ?>
              <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                <i class="bi bi-check-circle me-1"></i>
                <?php echo e(session('success')); ?>

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              <?php endif; ?>

            <!-- Detail Akun -->
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="/storage/<?php echo e(request()->user()->buyer_photo); ?>" alt="Profile" class="rounded-circle">
              <h2><?php echo e(request()->user()->payer_name); ?></h2>
              <h3><?php echo e(request()->user()->role); ?></h3>
            </div>

            <div class="tab-pane fade show active profile-overview" id="profile-overview">

              <div class="row">
                <div class="col-lg-3 col-md-4 label">ID Admin</div>
                <div class="col-lg-9 col-md-8"><?php echo e(request()->user()->payer_id); ?></div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Nama Admin</div>
                <div class="col-lg-9 col-md-8"><?php echo e(request()->user()->payer_name); ?></div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Jenis Kelamin</div>
                <div class="col-lg-9 col-md-8"><?php echo e(request()->user()->gender_buyer); ?></div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Nomor HP</div>
                <div class="col-lg-9 col-md-8"><?php echo e(request()->user()->phone); ?></div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Alamat</div>
                <div class="col-lg-9 col-md-8"><?php echo e(request()->user()->address); ?></div>
              </div>


            </div><!-- Detail Akun -->
            <div class="text-center pt-4">
              <a href="/admin/profile/<?php echo e(request()->user()->id); ?>/edit" class="btn btn-warning">Edit Profile</a>
            </div>

          </div>
        </div>

    </section>



  </main><!-- End #main -->



<?php $__env->stopSection(); ?>

<?php echo $__env->make('master.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/mrizkyfadhilah/Documents/ASKRIPSI/app/e-koperasi-web/resources/views/layouts/profile/index.blade.php ENDPATH**/ ?>