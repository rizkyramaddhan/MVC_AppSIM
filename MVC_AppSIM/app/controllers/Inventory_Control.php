<?php

class Inventory_Control extends Controller {
    public function index() {
        session_start();
        if (!isset($_SESSION['user'])) {
            echo "<script>alert('Silakan login terlebih dahulu.');window.location.href='" . BASE_URL . "/login';</script>";
            exit;
        }
        $this->view('templets/header_SIM');
        $this->view("inventory_control/index");
        $this->view('templets/Footer_SIM');
    }
}