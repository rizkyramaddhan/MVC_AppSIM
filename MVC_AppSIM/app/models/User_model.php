<?php

class User_model
{
    private $db;

    public function __construct()
    {
        $this->db = Database::connect(); // Asumsi Anda sudah memiliki kelas Database untuk koneksi DB
    }

    // Menambahkan pengguna baru
    public function register($username, $password, $role)
    {
        // Pastikan role sesuai dengan ketentuan
        $role = in_array($role, [0, 1, 3]) ? $role : 3; // Default ke Staff (3) jika role tidak valid

        $query = "INSERT INTO users (username, password, role) VALUES (:username, :password, :role)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password); // Pastikan password sudah di-hash sebelumnya
        $stmt->bindParam(':role', $role);
        return $stmt->execute();
    }

    // Memperbarui data pengguna
    public function updateUser($id, $username, $password, $role)
    {
        // Pastikan role sesuai dengan ketentuan
        $role = in_array($role, [0, 1, 3]) ? $role : 3; // Default ke Staff (3) jika role tidak valid

        $query = "UPDATE users SET username = :username, password = :password, role = :role WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password); // Pastikan password sudah di-hash sebelumnya
        $stmt->bindParam(':role', $role);
        return $stmt->execute();
    }

    // Mengambil pengguna berdasarkan ID
    public function getUserById($id)
    {
        $query = "SELECT * FROM users WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Mengambil semua pengguna
    public function getAllUsers()
    {
        $query = "SELECT * FROM users";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Menghapus pengguna berdasarkan ID
    public function deleteUser($id)
    {
        $query = "DELETE FROM users WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
