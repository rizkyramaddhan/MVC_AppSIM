<?php

class Dasbord extends Controller
{
    public function index()
    {
        session_start();
        if (!isset($_SESSION['user'])) {
            echo "<script>alert('Silakan login terlebih dahulu.');window.location.href='" . BASE_URL . "/login';</script>";
            exit;
        }
        $this->view('templets/header_SIM');
        $this->view('dasbord/index');
        $this->view('templets/Footer_SIM');
    }
}
