<?php $__env->startSection('content'); ?>


<main id="main" class="main">

    <div class="pagetitle">
      <h1>Edit Akun</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/admin">Koperasi</a></li>
          <li class="breadcrumb-item"><a href="/admin/users/edit">Akun</a></li>
          <li class="breadcrumb-item active">Edit Akun</li>
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

          <!-- Buat Akun Baru -->
          <form class="row g-3 mt-1" method="POST" action="/admin/users/<?php echo e($user->id); ?>">
              <?php echo csrf_field(); ?>
              <?php echo method_field('put'); ?>
              <div>
                  <h5 class="card-title">Role User</h5>
                  <span class="text-muted small pt-2 ps-1">*Role digunakan untuk mengkategorikan jenis akun yang akan dibuat, Admin = Website, Cashier & Buyer = Android</span>
              </div>
              <div class="col-12">
                  <div class="col-12 mb-4">
                  <div class="form-floating mb-3">
                      <select class="form-select" id="floatingUserCategory" aria-label="State" name="user_category" required>
                          <option value="payer" <?php echo e($user->user_category ==  'payer' ? 'selected' : ''); ?>>Pembayar</option>
                          <option value="cashier" <?php echo e($user->user_category ==  'cashier' ? 'selected' : ''); ?>>Kasir</option>
                          <option value="administrator" <?php echo e($user->user_category ==  'administrator' ? 'selected' : ''); ?>>Admin</option>
                      </select>
                      <label for="floatingUserCategory">Role</label>
                  </div>
                  </div>
                  <div class="col-12">
                      <div class="form-floating mb-3">
                          <select class="form-select" id="floatingRole" aria-label="State"  name="role" required>
                              <option value="Orang Tua/Wali" <?php echo e($user->role ==  'Orang Tua/Wali' ? 'selected' : ''); ?>>Orang Tua/Wali</option>
                              <option value="Guru" <?php echo e($user->role ==  'Guru' ? 'selected' : ''); ?>>Guru</option>
                              <option value="Kasir" <?php echo e($user->role ==  'Kasir' ? 'selected' : ''); ?>>Kasir</option>
                              <option value="Administrator" <?php echo e($user->role ==  'Administrator' ? 'selected' : ''); ?>>Admin</option>
                          </select>
                          <label for="floatingRole">Peran</label>
                      </div>
                  </div>
              </div>

              <div>
                  <h5 class="card-title">Data Pembeli</h5>
                  <span class="text-muted small pt-2 ps-1">*Data pembeli hanya digunakan untuk mencetak Kartu ID pembelian</span>
              </div>

              <div class="col-12">
                  <div class="col-12 mb-4">
                  <div class="form-floating">
                      <input type="number" class="form-control" id="floatingIdBuyer" placeholder="ID Pembeli" name="buyer_id" required value="<?php echo e($user->buyer_id); ?>">
                      <label for="floatingName">ID Pembeli</label>
                  </div>
                  </div>
                  <div class="col-md-12 mb-4">
                  <div class="form-floating">
                      <input type="text" class="form-control" id="floatingNameBuyer" placeholder="Nama Pembeli" name="buyer_name" required value="<?php echo e($user->buyer_name); ?>">
                      <label for="floatingName">Nama Pembeli</label>
                  </div>
                  </div>
                  <fieldset class="row mb-4">
                      <legend class="col-form-label col-sm-3 pt-2 ps-3">Jenis Kelamin Pembeli</legend>
                      <div class="col-12">
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="gender_buyer" id="gridRadios1" value="Laki - Laki" <?php echo e($user->gender_buyer ==  'Laki - Laki' ? 'checked' : ''); ?>>
                          <label class="form-check-label" for="gridRadios1">
                          Laki - Laki
                          </label>
                      </div>
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="gender_buyer" id="gridRadios2" value="Perempuan" <?php echo e($user->gender_buyer ==  'Perempuan' ? 'checked' : ''); ?>>
                          <label class="form-check-label" for="gridRadios2">
                          Perempuan
                          </label>
                      </div>
                      </div>
                  </fieldset>


              </div>

              <div>
                  <h5 class="card-title">Data Pembayar</h5>
                  <span class="text-muted small pt-2 ps-1">*Data pembayar digunakan untuk membuat akun Alplikasi Android, Password akan otomatis sama dengan ID</span>
              </div>


              <div class="col-12">
                  <div class="col-12 mb-4">
                      <div class="form-floating">
                          <input type="number" class="form-control" id="floatingIdPayer" placeholder="ID Pembayar" name="payer_id" required value="<?php echo e($user->payer_id); ?>">
                          <label for="floatingName">ID Pembayar</label>
                      </div>
                  </div>
                  <div class="col-md-12 mb-4">
                      <div class="form-floating">
                          <input type="text" class="form-control" id="floatingNamePayer" placeholder="Nama Pembayar" name="payer_name" required value="<?php echo e($user->payer_name); ?>">
                          <label for="floatingName">Nama Pembayar</label>
                      </div>
                  </div>
                  <div class="col-md-12 mb-4">
                      <div class="form-floating">
                          <input type="number" class="form-control" id="floatingPhonePayer" placeholder="Nomor HP" name="phone" required value="<?php echo e($user->phone); ?>">
                          <label for="floatingName">Nomor HP</label>
                      </div>
                  </div>
                  <div class="col-12 mb-4">
                      <div class="form-floating">
                          <textarea class="form-control" placeholder="Alamat" id="floatingTextarea" style="min-height: 120px;" name="address" required ><?php echo e($user->address); ?></textarea>
                          <label for="floatingTextarea">Alamat</label>
                      </div>
                  </div>

              </div>
              <div class="text-center m-4">
                  <button type="submit" class="btn btn-primary">Ubah</button>
              </div>
          </form><!-- Buat Akun Baru -->


        </div>
      </div>

  </main><!-- End #main -->


  <?php $__env->stopSection(); ?>

<?php echo $__env->make('master.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /media/yunus-febriansyah/DATA1/AppProject/laravel-apps/e-koperasi-web/resources/views/layouts/users/edit.blade.php ENDPATH**/ ?>