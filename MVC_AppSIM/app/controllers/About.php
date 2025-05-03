<?php 

class About extends Controller{
    public function index($name = 'Rizky', $age = 21){
        $data['title'] = 'Halaman About 1';
        $data['name'] = $name;
        $data['age'] = $age;
        $this->view('templets/header', $data);
        $this->view('about/index', $data);
        $this->view('templets/footer', $data);
    }

    public function contact(){
        $data['title'] = 'Halaman Contact';
        $this->view('templets/header', $data);
        $this->view('about/Contact');
        $this->view('templets/footer');
    }
}