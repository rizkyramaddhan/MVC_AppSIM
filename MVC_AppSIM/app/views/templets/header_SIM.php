<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    body {
      overflow-x: hidden;
    }

    .sidebar {
      height: 100vh;
      background-color: #343a40;
      color: #fff;
      position: fixed;
      width: 250px;
      transition: all 0.3s;
    }

    .sidebar.collapsed {
      width: 80px;
    }

    .sidebar .nav-link {
      color: #adb5bd;
      transition: 0.3s;
      text-align: center;
    }

    .sidebar .nav-link:hover, .sidebar .nav-link.active {
      background-color: #495057;
      color: #fff;
    }

    .sidebar .nav-icon {
      font-size: 1.2rem;
    }

    .sidebar .nav-text {
      font-size: 0.9rem;
    }

    .sidebar.collapsed .nav-text {
      display: none;
    }

    .content {
      margin-left: 250px;
      padding: 20px;
      transition: margin-left 0.3s;
    }

    .content.collapsed {
      margin-left: 80px;
    }

    .navbar-top {
      margin-left: 250px;
      padding: 10px 20px;
      background-color: #f8f9fa;
      border-bottom: 1px solid #dee2e6;
      transition: margin-left 0.3s;
    }

    .navbar-top.collapsed {
      margin-left: 80px;
    }

    .dropdown-toggle::after {
      display: none;
    }

    .hamburger-btn {
      border: none;
      background: none;
      font-size: 1.5rem;
      margin-right: 15px;
    }

    ul#submenu1 {
      text-align: left;
    }

    .sidebar.collapsed ul#submenu1 {
      display: none;
    }
  </style>
</head>
<body>

<!-- Sidebar -->
<!-- Sidebar -->
<!-- Sidebar -->
<!-- Sidebar -->
<div id="sidebar" class="sidebar d-flex flex-column p-3">
  <h4 class="text-white text-center mb-4 nav-text">SCASYS</h4>
  <ul class="nav nav-pills flex-column mb-auto">
    <li class="nav-item">
      <a href="#" class="nav-link active">
        <i class="bi bi-house-door nav-icon"></i>
        <div class="nav-text">Dashboard</div>
      </a>
    </li>
    <li>
      <a href="#submenu1" data-bs-toggle="collapse" class="nav-link">
        <i class="bi bi-box nav-icon"></i>
        <div class="nav-text">Kontrol Inventaris</div>
      </a>
      <ul class="collapse list-unstyled ps-3" id="submenu1">
        <li>
          <a href="#" class="nav-link">
            <i class="bi bi-archive nav-icon"></i> <!-- Ikon Bahan Baku -->
            <div class="nav-text">Bahan Baku</div>
          </a>
        </li>
      </ul>
    </li>
    <!-- Manajemen Akun untuk Admin -->
    <li>
      <a href="#submenu2" data-bs-toggle="collapse" class="nav-link">
        <i class="bi bi-person-circle nav-icon"></i>
        <div class="nav-text">Manajemen Akun</div>
      </a>
      <ul class="collapse list-unstyled ps-3" id="submenu2">
        <li>
          <a href="#" class="nav-link">
            <i class="bi bi-person-check nav-icon"></i>
            <div class="nav-text">Kelola Pengguna</div>
          </a>
        </li>
        <li>
          <a href="#" class="nav-link">
            <i class="bi bi-lock nav-icon"></i>
            <div class="nav-text">Ubah Kata Sandi</div>
          </a>
        </li>
      </ul>
    </li>
    <!-- Riwayat Aktivitas untuk Admin -->
    <li>
      <a href="#submenu3" data-bs-toggle="collapse" class="nav-link">
        <i class="bi bi-clock-history nav-icon"></i>
        <div class="nav-text">Riwayat Aktivitas</div>
      </a>
      <ul class="collapse list-unstyled ps-3" id="submenu3">
        <li>
          <a href="#" class="nav-link">
            <i class="bi bi-list nav-icon"></i>
            <div class="nav-text">Lihat Riwayat</div>
          </a>
        </li>
      </ul>
    </li>
  </ul>
</div>



<!-- Top Navbar -->
<!-- Top Navbar -->
<div id="topbar" class="navbar-top d-flex justify-content-between align-items-center">
  <div>
    <button class="hamburger-btn" id="toggleSidebar">
      <!-- Ganti dengan Bootstrap Icon -->
      <i class="bi bi-list"></i> <!-- Ikon menu hamburger dari Bootstrap -->
    </button>
  </div>
  <div class="dropdown">
    <a href="#" class="d-flex align-items-center text-decoration-none text-dark dropdown-toggle" id="dropdownUser" data-bs-toggle="dropdown" aria-expanded="false">
      <!-- Ganti dengan Bootstrap Icon -->
      <i class="bi bi-person-circle fs-2 me-2"></i> <!-- Ikon user dari Bootstrap -->
      <strong><?= $_SESSION['user']['username']; ?></strong>
    </a>
    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownUser">
      <li><a class="dropdown-item" href="#"><i class="bi bi-gear me-2"></i>Pengaturan</a></li> <!-- Ikon pengaturan dari Bootstrap -->
      <li><hr class="dropdown-divider"></li>
      <li><a class="dropdown-item" href="<?= BASE_URL; ?>/login/logout"><i class="bi bi-box-arrow-right me-2"></i>Keluar</a></li> <!-- Ikon logout dari Bootstrap -->
    </ul>
  </div>
</div>
