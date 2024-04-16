<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title><?php echo e($title); ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <style>
    *{
      font-family: serif;
    }
    .bg-id-card{
        background-image: url('<?php echo e('/assets/img/bg-id-card.png'); ?>');
        background-size: cover;
        background-repeat: no-repeat;
        background-position: top center;
    }
    @media print {
        .pagebreak { page-break-before: always; } /* page-break-after works, as well */
        .bg-id-card {
            visibility: visible;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: top center;
            -webkit-print-color-adjust: exact;
        }
    }
    p{
        margin: 0;
        padding: 0;
    }
  </style>
</head>
<body>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-4 bg-id-card border pt-5">
                <div class="row justify-content-center mt-5">
                    <div class="col-9">
                        <dl class="row" style="margin-top: 10px;">
                            <dt class="col-4">NSM</dt>
                            <dd class="m-0 p-0 col-8">: <?php echo e($user->buyer_id); ?></dd>
                            <dt class="col-4">Nama</dt>
                            <dd class="m-0 p-0 col-8">: <?php echo e($user->buyer_name); ?></dd>
                            <dt class="col-4">Jenis Kelamin</dt>
                            <dd class="m-0 p-0 col-8">: <?php echo e($user->gender_buyer); ?></dd>
                            <dt class="col-4">Orang Tua</dt>
                            <dd class="m-0 p-0 col-8">: <?php echo e($user->payer_name); ?></dd>
                            <dt class="col-4">Alamat</dt>
                            <dd class="m-0 p-0 col-8">: <?php echo e($user->address); ?></dd>
                        </dl>
                    </div>
                </div>
                <div class="row justify-content-between mt-2 mb-4">
                    <div class="col-4">
                        <div class="border border-dark rounded p-1">
                            <img alt="Barcode <?php echo e($user->buyer_name); ?>" src="https://barcode.tec-it.com/barcode.ashx?data=<?php echo e($user->buyer_id); ?>&code=Code128&translate-esc=on" width="100%"/>
                        </div>
                    </div>
                    <div class="col-6 position-relative">
                        <img class="position-absolute mt-3" alt="Tanda Tangan" src="/assets/img/ttd-id-card.png" height="100"/>
                        <p>Batanghari Nuban, <?php echo e(getDateNow()); ?></p>
                        <p>Kepala Madrasah</p>
                        <br>
                        <br>
                        <p>SUGENG RAHARJO, S.Pd.I.</p>
                        <p>NUPTK. 1342736639200093</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
  <script>
    window.print();
  </script>
</body>
</html>
<?php /**PATH /media/yunus-febriansyah/DATA1/AppProject/laravel-apps/e-koperasi-web/resources/views/layouts/users/print-single.blade.php ENDPATH**/ ?>