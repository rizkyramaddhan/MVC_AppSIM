<?php 

class Mahasiswa extends Controller
{
   public function index(){
    $data ['title'] = 'Halaman Siswa';
    $data ['mhs'] = $this->model('Mahasiswa_model')->getALL();
    $this->view('templets/header', $data);
    $this->view('mahasiswa/index', $data);
    $this->view('templets/footer');
   }
}