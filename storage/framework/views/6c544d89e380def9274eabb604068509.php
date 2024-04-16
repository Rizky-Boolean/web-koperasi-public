<?php $__env->startSection('content'); ?>


<main id="main" class="main">

    <div class="pagetitle">
      <h1>Ganti Password Admin</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/admin">Koperasi</a></li>
          <li class="breadcrumb-item active">Ganti Password Admin</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->


    <div class="card">
      <div class="card-body">

        <?php if($errors->any()): ?>
        <div class="alert alert-danger mt-3">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
        <?php endif; ?>
        <?php if(session('failed')): ?>
          <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
            <i class="bi bi-check-circle me-1"></i>
            <?php echo e(session('failed')); ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        <?php endif; ?>

        <!-- Buat Akun Baru -->
        <form class="row g-3 mt-1" action="/admin/change-password" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('put'); ?>

          <div class="col-md-12 mb-3">
            <div class="form-floating">
              <input type="password" class="form-control" id="floatingOldPassword" name="old_password" placeholder="Your old password">
              <label for="floatingOldPassword">Passsword Lama</label>
            </div>
          </div>

          <div class="col-md-12 mb-3">
            <div class="form-floating">
              <input type="password" class="form-control" id="floatingNewPassword" name="new_password" placeholder="Your new password">
              <label for="floatingNewPassword">Passsword Baru</label>
            </div>
          </div>

          <div class="col-md-12 mb-3">
            <div class="form-floating">
              <input type="password" class="form-control" id="floatingRepeatPassword" name="repeat_password" placeholder="Repeat your new password">
              <label for="floatingRepeatPassword">Ulangi Passsword Baru</label>
            </div>
          </div>

          <div class="text-center m-4">
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
          </div>
        </form><!-- Buat Akun Baru -->


      </div>
    </div>

  </main><!-- End #main -->


<?php $__env->stopSection(); ?>

<?php echo $__env->make('master.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /media/yunus-febriansyah/DATA1/AppProject/laravel-apps/e-koperasi-web/resources/views/layouts/profile/change-password.blade.php ENDPATH**/ ?>