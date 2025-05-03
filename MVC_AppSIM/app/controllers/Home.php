<?php

class Home extends Controller{
    public function index(){
        $data['title'] = 'Halaman Home 1';
        // $data['name'] = $this->model("user_model")->getUser();
        $this->view('templets/header', $data);
        $this->view('home/index', $data);
        $this->view('templets/footer');
    }
}