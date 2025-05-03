<?php

class login extends Controller
{
    public function index()
    {
        $this->view('login/index');
    }

    public function register()
    {
        $this->view('login/register');
    }

    public function registerProcess()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirm_password'];

        $userModel = $this->model('User_model');

        if ($password !== $confirmPassword) {
            echo "<script>alert('Password tidak cocok!');window.history.back();</script>";
            exit;
        }

        if ($userModel->findByUsername($username)) {
            echo "<script>alert('Username sudah digunakan!');window.history.back();</script>";
            exit;
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        if ($userModel->register($username, $hashedPassword)) {
            echo "<script>alert('Register berhasil! Silakan login.');window.location.href='" . BASE_URL . "/login';</script>";
        } else {
            echo "<script>alert('Register gagal!');window.history.back();</script>";
        }
    }

    public function loginProcess()
    {
        session_start();

        $username = $_POST['username'];
        $password = $_POST['password'];

        $userModel = $this->model('User_model');
        $user = $userModel->findByUsername($username);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user'] = [
                'id' => $user['id'],
                'username' => $user['username']
            ];
            echo "<script>alert('Login berhasil!');window.location.href='" . BASE_URL . "/dasbord';</script>";
        } else {
            echo "<script>alert('Username atau password salah!');window.history.back();</script>";
        }
    }

    public function logout()
    {
        session_start();
        session_destroy();
        echo "<script>alert('Anda telah logout.');window.location.href='" . BASE_URL . "/login';</script>";
    }
}
