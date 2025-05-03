

  <!-- Main Content -->
  <div id="mainContent" class="content">

    <!-- Title Section -->
    <div class="row">
      <div class="col-12">
        <h1 class="text-primary">Manajemen Bahan Baku</h1>
        <p class="text-muted">Kelola semua bahan baku yang tersedia di sistem</p>
      </div>
    </div>

    <!-- Cards & Buttons Section -->
    <div class="row">
      <!-- Card - Bahan Baku Table -->
      <div class="col-12">
        <div class="card shadow-sm">
          <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
              <h5 class="mb-0">Daftar Bahan Baku</h5>
              <button class="btn btn-add d-flex align-items-center">
                <i class="bi bi-plus-circle me-2"></i> Tambah Bahan Baku
              </button>
            </div>
          </div>
          <div class="card-body">
            <table class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nama Bahan Baku</th>
                  <th>Kategori</th>
                  <th>Stok</th>
                  <th>Harga Satuan</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>Gula Pasir</td>
                  <td>Pangan</td>
                  <td>500 kg</td>
                  <td>Rp 10,000</td>
                  <td>
                    <button class="btn btn-outline-info btn-sm">
                      <i class="bi bi-pencil-square icon-btn"></i> Edit
                    </button>
                    <button class="btn btn-outline-danger btn-sm">
                      <i class="bi bi-trash icon-btn"></i> Hapus
                    </button>
                  </td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Tepung Terigu</td>
                  <td>Pangan</td>
                  <td>200 kg</td>
                  <td>Rp 8,000</td>
                  <td>
                    <button class="btn btn-outline-info btn-sm">
                      <i class="bi bi-pencil-square icon-btn"></i> Edit
                    </button>
                    <button class="btn btn-outline-danger btn-sm">
                      <i class="bi bi-trash icon-btn"></i> Hapus
                    </button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <!-- Chart Section -->
    <div class="row mt-4">
      <div class="col-12">
        <div class="card shadow-sm">
          <div class="card-header">
            <h5 class="mb-0">Grafik Stok Bahan Baku</h5>
          </div>
          <div class="card-body">
            <canvas id="stockChart"></canvas>
          </div>
        </div>
      </div>
    </div>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    const ctx = document.getElementById('stockChart').getContext('2d');
    const stockChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ['Gula Pasir', 'Tepung Terigu'],
        datasets: [{
          label: 'Stok Bahan Baku (kg)',
          data: [500, 200],
          backgroundColor: 'rgba(54, 162, 235, 0.2)',
          borderColor: 'rgba(54, 162, 235, 1)',
          borderWidth: 1
        }]
      },
      options: {
        responsive: true,
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
  </script>

