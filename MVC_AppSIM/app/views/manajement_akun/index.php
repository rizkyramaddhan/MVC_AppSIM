<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Manajemen Akun</title>
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
  </ul>
</div>

<!-- Top Navbar -->
<div id="topbar" class="navbar-top d-flex justify-content-between align-items-center">
  <div>
    <button class="hamburger-btn" id="toggleSidebar">
      <i class="bi bi-list"></i> <!-- Ikon menu hamburger dari Bootstrap -->
    </button>
  </div>
  <div class="dropdown">
    <a href="#" class="d-flex align-items-center text-decoration-none text-dark dropdown-toggle" id="dropdownUser" data-bs-toggle="dropdown" aria-expanded="false">
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

<!-- Main Content -->
<div id="mainContent" class="content">
  <h3>Manajemen Akun</h3>
  <p class="text-muted">Kelola semua akun pengguna di bawah ini.</p>
  
  <div class="table-responsive">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>Nama Pengguna</th>
          <th>Email</th>
          <th>Role</th>
          <th>Opsi</th>
        </tr>
      </thead>
      <tbody>
        <!-- Loop untuk menampilkan data akun -->
        <?php foreach ($data['user'] as $user): ?>
          <tr>
            <td><?= $user['id']; ?></td>
            <td><?= $user['username']; ?></td>
            <td><?= $user['email']; ?></td>
            <td>
                        <?php
                            // Menampilkan role dalam bentuk teks
                            if ($user['role'] == 0) {
                                echo 'Admin';
                            } elseif ($user['role'] == 1) {
                                echo 'Manajer';
                            } else {
                                echo 'Staff';
                            }
                        ?>
                    </td>
            <td>
               <!-- Tombol Edit untuk membuka modal -->
               <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal" 
                                data-id="<?= $user['id']; ?>"
                                data-username="<?= $user['username']; ?>"
                                data-role="<?= $user['role']; ?>"
                        >
                            <i class="bi bi-pencil-square"></i> Edit
                </button>
                <a href="<?= BASE_URL; ?>/manajement_akun/delete/<?= $user['id']; ?>" class="btn btn-danger btn-sm">
                            <i class="bi bi-trash"></i> Hapus
                        </a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

  <!-- Tombol untuk menambah akun -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">Tambah Akun</button>

<!-- Modal untuk Create Akun -->
<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Tambah Akun Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?= BASE_URL; ?>/manajement_akun/store">
                    <div class="mb-3">
                        <label for="create-username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="create-username" name="username" required>
                    </div>

                    <div class="mb-3">
                        <label for="create-password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="create-password" name="password" required>
                    </div>

                    <div class="mb-3">
                        <label for="create-role" class="form-label">Role</label>
                        <select class="form-control" id="create-role" name="role" required>
                            <option value="0">Admin</option>
                            <option value="1">Manajer</option>
                            <option value="3">Staff</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal untuk Edit Akun -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Akun</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?= BASE_URL; ?>/manajement_akun/update/" id="editForm">
                    <input type="hidden" name="id" id="edit-id">

                    <div class="mb-3">
                        <label for="edit-username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="edit-username" name="username" required>
                    </div>

                    <div class="mb-3">
                        <label for="edit-password" class="form-label">Password (Kosongkan jika tidak ingin mengubah)</label>
                        <input type="password" class="form-control" id="edit-password" name="password">
                    </div>

                    <div class="mb-3">
                        <label for="edit-role" class="form-label">Role</label>
                        <select class="form-control" id="edit-role" name="role" required>
                            <option value="0">Admin</option>
                            <option value="1">Manajer</option>
                            <option value="3">Staff</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Perbarui</button>
                </form>
            </div>
        </div>
    </div>
</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
  const sidebar = document.getElementById('sidebar');
  const content = document.getElementById('mainContent');
  const topbar = document.getElementById('topbar');
  const toggleBtn = document.getElementById('toggleSidebar');
  const editModal = document.getElementById('editModal');
  
    editModal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget; // Tombol yang mengaktifkan modal
        const id = button.getAttribute('data-id');
        const username = button.getAttribute('data-username');
        const role = button.getAttribute('data-role');
        
        const modalTitle = editModal.querySelector('.modal-title');
        const form = editModal.querySelector('form');
        const idField = form.querySelector('#edit-id');
        const usernameField = form.querySelector('#edit-username');
        const roleField = form.querySelector('#edit-role');

        // Isi data ke dalam modal
        idField.value = id;
        usernameField.value = username;
        roleField.value = role;
    });

  toggleBtn.addEventListener('click', () => {
    sidebar.classList.toggle('collapsed');
    content.classList.toggle('collapsed');
    topbar.classList.toggle('collapsed');
  });
</script>
</body>
</html>
