<?php $__env->startSection('content'); ?>


<main id="main" class="main">

    <div class="pagetitle">
      <h1>Edit Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/admin">Koperasi</a></li>
          <li class="breadcrumb-item"><a href="/admin/profile">Profile Admin</a></li>
          <li class="breadcrumb-item active">Edit Profile</li>
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
        <!-- Edit akun admin -->
        <form class="row g-3 mt-1" method="POST" action="/admin/profile/<?php echo e(request()->user()->id); ?>" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php echo method_field('put'); ?>
          <div>
            <h5 class="card-title">Foto Profile</h5>
          </div>

          <div class="card-body profile-card d-flex flex-column align-items-center">
            <img src="/storage/<?php echo e(request()->user()->buyer_photo); ?>" alt="Profile" class="rounded-circle" height="200">
          </div>



          <div>
            <h5 class="card-title">Data Admin</h5>
          </div>
            <!-- Edit akun admin -->
          <div class="col-12">
            <div class="col-12 mb-4">
              <div class="form-floating">
                <input type="text" class="form-control" id="floatingPhone" placeholder="Your Phone" name="phone" required value="<?php echo e(request()->user()->phone); ?>">
                <label for="floatingPhone">Nomor HP</label>
              </div>
            </div>
            <div class="col-12 mb-4">
              <div class="form-floating">
                <textarea class="form-control" placeholder="Address" id="floatingTextarea" style="height: 100px;" name="address" required ><?php echo e(request()->user()->address); ?></textarea>
                <label for="floatingTextarea">Alamat</label>
              </div>
            </div>
            <div class="col-12 mb-4">
                <label for="floatingPhoto">Foto Profil (*kosongkan jika tidak ingin mengganti foto)</label>
                <input type="file" class="form-control" id="floatingPhoto" placeholder="Ganti foto profil" name="buyer_photo">
            </div>

          </div>


          <div class="text-center m-4">
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
          </div>
        </form><!-- Edit akun admin -->


      </div>
    </div>


  </main><!-- End #main -->


<?php $__env->stopSection(); ?>

<?php echo $__env->make('master.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /media/yunus-febriansyah/DATA1/AppProject/laravel-apps/e-koperasi-web/resources/views/layouts/profile/edit.blade.php ENDPATH**/ ?>