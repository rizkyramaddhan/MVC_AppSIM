<?php

class Mahasiswa_model{
    // private $mhs = [
    //     [
    //         "nama" => "Rizky Ramadhan",
    //         "nim" => "203040068",
    //         "jurusan" => "Teknik Informatika"
    //     ],
    //     [
    //         "nama" => "Yuda Risol",
    //         "nim" => "203040060",
    //         "jurusan" => "Teknik Sipil"
    //     ]
    // ];

    private $dbh,
            $stmt;

    public function __construct()
    {
        $dsn = 'mysql:host=localhost;dbname=phpmvc';
        try {
            $this->dbh  = new PDO($dsn, 'root', '');
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getAll(){
        $this->stmt = $this->dbh->prepare('SELECT * FROM mahasiswa');
        $this->stmt->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}