
  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link <?php echo e((request()->is('admin')) ? '' : 'collapsed'); ?>" href="/admin">
          <i class="bi <?php echo e((request()->is('admin')) ? 'bi-pie-chart-fill' : 'bi-pie-chart'); ?>"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->


      <li class="nav-item">
        <a class="nav-link <?php echo e((request()->is('admin/users*')) ? '' : 'collapsed'); ?>" href="/admin/users">
          <i class="bi <?php echo e((request()->is('admin/users*')) ? 'bi-person-fill' : 'bi-person'); ?>"></i>
          <span>Pengguna</span>
        </a>
      </li><!-- End Profile Page Nav -->


      <li class="nav-item">
          <a class="nav-link <?php echo e((request()->is('admin/products*')) ? '' : 'collapsed'); ?>" href="/admin/products">
              <i class="bi <?php echo e((request()->is('admin/products*')) ? 'bi-box-seam-fill' : 'bi-box-seam'); ?>"></i>
              <span>Produk</span>
            </a>
        </li><!-- End F.A.Q Page Nav -->

        <li class="nav-item">
            <a class="nav-link <?php echo e((request()->is('admin/transactions*')) ? 'show' : 'collapsed'); ?>" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-graph-up"></i><span>Transaksi</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="tables-nav" class="nav-content collapse <?php echo e((request()->is('admin/transactions*')) ? 'show' : ''); ?> " data-bs-parent="#sidebar-nav">

          <li class="nav-item">
              <a class="nav-link <?php echo e((request()->is('admin/transactions/cash*')) ? '' : 'collapsed'); ?>" href="/admin/transactions/cash">
                  <i class="bi <?php echo e((request()->is('admin/transactions/cash*')) ? 'bi-cash-stack' : 'bi-cash'); ?>" style="font-size: 1rem; color: cornflowerblue;"></i>
                  <span>Tunai</span>
                </a>
            </li><!-- End Contact Page Nav -->

            <li class="nav-item">
                <a class="nav-link <?php echo e((request()->is('admin/transactions/credit*')) ? '' : 'collapsed'); ?>" href="/admin/transactions/credit">
                    <i class="bi <?php echo e((request()->is('admin/transactions/credit*')) ? 'bi-journal-bookmark-fill' : 'bi-journal-bookmark'); ?>" style="font-size: 1rem; color: cornflowerblue;"></i>
                    <span>Kredit</span>
                </a>
            </li><!-- End Register Page Nav -->

        </ul>
    </li><!-- End Tables Nav -->

    <li class="nav-item">
        <a class="nav-link <?php echo e((request()->is('admin/reports*')) ? '' : 'collapsed'); ?>" href="/admin/reports?month=<?php echo e(getMonthNumber()); ?>&year=<?php echo e(getYear()); ?>">
            <i class="bi <?php echo e((request()->is('admin/reports*')) ? 'bi-bar-chart-line-fill' : 'bi-bar-chart-line'); ?>"></i>
            <span>Laporan Bulanan</span>
        </a>
    </li><!-- End Login Page Nav -->



    </ul>

  </aside><!-- End Sidebar-->
<?php /**PATH /Users/mrizkyfadhilah/Documents/ASKRIPSI/app/e-koperasi-web/resources/views/partials/sidebar.blade.php ENDPATH**/ ?>