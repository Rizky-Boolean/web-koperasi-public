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
    .text-center{
      text-align: center;
    }
    table {
        border-spacing: 0px;
        border-collapse: collapse;
        width: 100%;
      }
    table, td, th{
      border: 1px solid #000;
    }
    td {
      padding: 5px;
      vertical-align: middle;
    }
    th {
      padding: 10px;
    }
    .bg-secondary {
        background-color: #dedede !important;
    }
    table th{
      background-color: #dedede;
      vertical-align: middle;
      font-weight: bold;
      text-align: center;
    }
    p{
        margin: 0;
        padding: 0;
    }
  </style>
</head>
<body>
  <img src="<?php echo e(url('assets/img/kop.png')); ?>" alt="Foto Kop Dokumen" style="width: 100%;">

  <dl class="row" style="margin-top: 10px;">
    <dt class="col-3">Nomor</dt>
    <dd class="m-0 p-0 col-9">:</dd>
    <dt class="col-3">Lampiran</dt>
    <dd class="m-0 p-0 col-9">: 1 Berkas</dd>
    <dt class="col-3">Perihal</dt>
    <dd class="m-0 p-0 col-9">: Laporan Penjualan Bulanan</dd>
  </dl>

  <p>Kepada Yth. Ketua Yayasan</p>
  <p>MI Nurul Huda Moroseneng</p>
  <br>
  <p><em>Assalamu'alaium. Wr. Wb.</em></p>
  <p>Bersama ini kami sampaikan Laporan Penjualan Koperasi MI Nurul Huda Moroseneng bulan <?php echo e(formatMonthYear(request('month'), request('year'))); ?> sebagai berikut:</p>


  <table>
    <thead>
      <tr>
        <th scope="col">No.</th>
        <th scope="col">Produk</th>
        <th scope="col">Harga</th>
        <th scope="col">Stok</th>
        <th scope="col">Terjual</th>
        <th scope="col">Terambil</th>
        <th scope="col">Tunai</th>
        <th scope="col">Kredit</th>
      </tr>
    </thead>
    <tbody>
        <?php $cashTotal = 0; $creditTotal = 0; ?>
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($loop->iteration); ?></td>
            <td><?php echo e($product->name); ?></td>
            <td><?php echo e(formatRupiah($product->price)); ?></td>
            <td><?php echo e($product->stock . ' ' . $product->unit); ?></td>
            <td><?php echo e(sumCashAmountFromPurchases($product->purchases) . ' ' . $product->unit); ?></td>
            <td><?php echo e(sumCreditAmountFromPurchases($product->purchases) . ' ' . $product->unit); ?></td>
            <td><?php echo e(formatRupiah(sumCashPriceFromPurchases($product->purchases))); ?></td>
            <td><?php echo e(formatRupiah(sumCreditPriceFromPurchases($product->purchases))); ?></td>
        </tr>
        <?php
            $cashTotal += sumCashPriceFromPurchases($product->purchases);
            $creditTotal += sumCreditPriceFromPurchases($product->purchases);
        ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <tr>
            <td class="bg-secondary" colspan="6">Uang Diterima</td>
            <td><?php echo e(formatRupiah($cashTotal)); ?></td>
            <td class="bg-secondary"></td>
        </tr>

        <tr>
            <td class="bg-secondary" colspan="6">Uang Belum Diterima</td>
            <td class="bg-secondary"></td>
            <td><?php echo e(formatRupiah($creditTotal)); ?></td>
          </tr>

    </tbody>
  </table>

  <script>
    window.print();
  </script>
</body>
</html>
<?php /**PATH /media/yunus-febriansyah/DATA1/AppProject/laravel-apps/e-koperasi-web/resources/views/layouts/reports/print.blade.php ENDPATH**/ ?>