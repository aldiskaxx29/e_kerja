<div class="main-sidebar">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <!-- <a href="#"><?= $user['role_id'] ?></a> -->
        <?php if ($user['role_id'] == 1): ?>
          <a href="#"> Manager</a>
        <?php elseif($user['role_id'] == 2): ?>
          <a href="#"> Admin</a>
        <?php elseif($user['role_id'] == 3): ?>
          <a href="#"> Ketua Team</a>
        <?php endif ?>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="#"><i class="fas fa-home"></i></a>
        <!-- <a href="#">A</a> -->
      </div>
      <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>

        <?php if ($user['role_id'] == '1'): ?>
          <li class="<?php if ($this->uri->segment('2') == 'Dashboard'): ?> active <?php endif ?>">
          <a href="<?= base_url('Manager/Dashboard/') ?>" class="nav-link"><i class="fas fa-home"></i><span>Dashboard</span></a>
          </li>
          <li class="menu-header">Starter</li>
          <!-- <li class="<?php if ($this->uri->segment('2') == 'Orderan'): ?> active <?php endif ?>">
            <a class="nav-link" href="<?= base_url('Manager/Orderan')  ?>"><i class="fas fa-home"></i> <span>Order Sales</span></a>
          </li> -->
          <li class="<?php if ($this->uri->segment('2') == 'Laporan'): ?> active <?php endif ?>">
            <a class="nav-link" href="<?= base_url('Manager/Laporan/')  ?>"><i class="fas fa-file"></i> <span>Laporan Monitoring</span></a>
          </li>
        <?php endif ?> 
        <?php if($user['role_id'] == '2'): ?>
          <li class="<?php if ($this->uri->segment('2') == 'Dashboard'): ?> active <?php endif ?>">
            <a href="<?= base_url('/Admin/Dashboard') ?>" class="nav-link"><i class="fas fa-home"></i><span>Dashboard</span></a>
          </li>
          <li class="menu-header">Starter</li>
          <li class="<?php if ($this->uri->segment('2') == 'Pekerjaan'): ?> active <?php endif ?>">
            <a class="nav-link" href="<?= base_url('Admin/Pekerjaan/')  ?>"><i class="fas fa fa-briefcase"></i> <span>Data Pekerjaan</span></a>
          </li>
          
          <li class="<?php if ($this->uri->segment('2') == 'Kegiatan'): ?> active <?php endif ?>">
            <a class="nav-link" href="<?= base_url('Admin/Kegiatan/')  ?>"><i class="fas fa fa-calendar"></i> <span>Data Kegiatan</span></a>
          </li>
          <li class="<?php if ($this->uri->segment('2') == 'Team'): ?> active <?php endif ?>">
            <a class="nav-link" href="<?= base_url('Admin/Team/')  ?>"><i class="fas fa fa-users"></i> <span>Data Team</span></a>
          </li>
          <li class="<?php if ($this->uri->segment('2') == 'Lokasi'): ?> active <?php endif ?>">
            <a class="nav-link" href="<?= base_url('Admin/Lokasi/')  ?>"><i class="fas fa fa-map-marker"></i> <span>Data Lokasi</span></a>
          </li>
          <li class="<?php if ($this->uri->segment('2') == 'Monitoring'): ?> active <?php endif ?>">
            <a class="nav-link" href="<?= base_url('Admin/Monitoring/')  ?>"><i class="fas fa-eye"></i> <span>Data Monitoring</span></a>
          </li>
         <!--  <li class="<?php if ($this->uri->segment('2') == 'User'): ?> active <?php endif ?>">
            <a class="nav-link" href="<?= base_url('Admin/User/')  ?>"><i class="fas fa-user"></i> <span>Data User</span></a>
          </li> -->
        <?php endif ?>
        <?php if ($user['role_id'] == '3'): ?>
          <li class="<?php if ($this->uri->segment('2') == 'Dashboard'): ?> active <?php endif ?>">
            <a href="<?= base_url('Ketua/Dashboard/') ?>" class="nav-link"><i class="fas fa-home"></i><span>Dashboard</span></a>
          </li>
          <li class="menu-header">Starter</li>
          <!-- <li class="<?php if ($this->uri->segment('2') == 'Acc'): ?> active <?php endif ?>">
            <a class="nav-link" href="<?= base_url('Ketua/Acc/')  ?>"><i class="fas fa-home"></i> <span>Acc</span></a>
          </li> -->
          <li class="<?php if ($this->uri->segment('2') == 'Team'): ?> active <?php endif ?>">
            <a class="nav-link" href="<?= base_url('Ketua/Team/')  ?>"><i class="fas fa-users"></i> <span>Data Team</span></a>
          </li>
<!--           <li class="<?php if ($this->uri->segment('2') == 'Toko'): ?> active <?php endif ?>">
            <a class="nav-link" href="<?= base_url('Ketua/Toko/')  ?>"><i class="fas fa-store"></i> <span>Toko</span></a>
          </li>
          <li class="<?php if ($this->uri->segment('2') == 'Order'): ?> active <?php endif ?>">
            <a class="nav-link" href="<?= base_url('Pegawai/Order/')  ?>"><i class="fas fa-users"></i> <span>Order</span></a>
          </li>
          <li class="<?php if ($this->uri->segment('2') == 'Absen'): ?> active <?php endif ?>">
            <a class="nav-link" href="<?= base_url('Pegawai/Absen/')  ?>"><i class="fas fa-user"></i> <span>Absen</span></a>
          </li> -->
        <?php endif ?>

      </ul>

        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
          <a href="<?= base_url('Admin/Dashboard/logout') ?>" class="btn btn-dark btn-lg btn-block btn-icon-split">
            <i class="fas fa-sign-out-alt"></i> Logout
          </a>
        </div>
    </aside>
</div>






