<?= $this->extend('layout/main') ?>

<?= $this->section('menu') ?>

<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion toggled" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url() ?>">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">OneAim</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url() ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Navigation
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseshop" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-shopping-basket"></i>
            <span>Manage</span>
        </a>
        <div id="collapseshop" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Data Center:</h6>

                <a class="collapse-item" href="<?= base_url('categories') ?>">Data Kategori</a>
                <a class="collapse-item" href="<?= base_url('files/indexmenu') ?>">Data Skin Pack</a>

            </div>
        </div>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('bug') ?>">
                <i class="fas fa-cog"></i>
                <span>Laporan Bug</span></a>
        </li>
    </li>
    <div class="sidebar-heading">
        Tools
    </div>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('upload') ?>">
            <i class="fas fa-video"></i>
            <span>Tambah Skin</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('corusel') ?>">
            <i class="fas fa-video"></i>
            <span>Corusel Setting</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('pengumuman') ?>">
            <i class="fas fa-video"></i>
            <span>Pengumuman Setting</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('pengaturan') ?>">
            <i class="fas fa-cog"></i>
            <span>App Settings</span></a>
    </li>

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
<?= $this->endSection() ?>

<?= $this->section('menu2') ?>

 <nav class="navbar fixed-bottom navbar-expand-sm navbar-dark bg-dark">
      <a class="navbar-brand" href="#">Navigasi</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url() ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>
          <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
              <li class="nav-item dropup">
                <a class="nav-link dropdown-toggle" href="https://getbootstrap.com/" id="dropdown10" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">            <i class="fas fa-fw fa-shopping-basket"></i>
                <span>Manage</span></a>
                <div class="dropdown-menu" aria-labelledby="dropdown10">
                    <a class="dropdown-item" href="<?= base_url('categories') ?>">Data Kategori</a>
                <a class="collapse-item" href="<?= base_url('files/indexmenu') ?>">Data Files</a>
                </div>
              </li>
              
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('bug') ?>">
                        <i class="fas fa-video"></i>
                        <span>Laporan Bug</span></a>
                </li>
              
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('upload') ?>">
                <i class="fas fa-video"></i>
                <span>Tambah Skin</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('corusel') ?>">
                <i class="fas fa-video"></i>
                <span>Corusel Setting</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('pengumuman') ?>">
                <i class="fas fa-video"></i>
                <span>Pengumuman Setting</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('pengaturan') ?>">
                <i class="fas fa-cog"></i>
                <span>App Settings</span></a>
        </li>

        </ul>
      </div>
    </nav>

<?= $this->endSection() ?>