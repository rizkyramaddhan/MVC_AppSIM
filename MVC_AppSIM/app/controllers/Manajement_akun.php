<?php 

class Manajement_akun extends Controller {
    
    // Menampilkan semua akun pengguna
    public function index() {
        session_start();
        if (!isset($_SESSION['user'])) {
            echo "<script>alert('Silakan login terlebih dahulu.');window.location.href='" . BASE_URL . "/login';</script>";
            exit;
        }

        // Mengambil semua data pengguna
        $data['user'] = $this->model('User_model')->getAllUsers();

        // Menampilkan halaman index dengan data pengguna
        $this->view('manajement_akun/index', $data);
    }

    // Menyimpan akun baru ke dalam database (Create)
    public function store() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);  // Meng-hash password
            $role = $_POST['role'];

            // Menyimpan akun baru
            $this->model('User_model')->register($username, $password, $role);

            // Redirect ke halaman manajemen akun
            header("Location: " . BASE_URL . "/manajement_akun");
        }
    }

    // Memperbarui data akun pengguna (Update)
    public function update() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $username = $_POST['username'];
            $password = !empty($_POST['password']) ? password_hash($_POST['password'], PASSWORD_DEFAULT) : null; // Meng-hash password jika diubah
            $role = $_POST['role'];

            // Memperbarui data akun
            $this->model('User_model')->updateUser($id, $username, $password, $role);

            // Redirect ke halaman manajemen akun
            header("Location: " . BASE_URL . "/manajement_akun");
        }
    }

    // Menghapus akun pengguna berdasarkan ID
    public function delete($id) {
        // Menghapus pengguna berdasarkan ID
        $this->model('User_model')->deleteUser($id);

        // Redirect ke halaman manajemen akun setelah penghapusan
        header("Location: " . BASE_URL . "/manajement_akun");
    }
}
