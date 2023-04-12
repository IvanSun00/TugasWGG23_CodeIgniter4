<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminInputModel extends Model
{
    protected $table            = 'user';
    protected $primaryKey       = 'id';
    protected $returnType       = 'object'; //bisa juga array

    protected $allowedFields    = ['username','nrp','email','password','nilai']; //field di table yg bisa diedit
    //misa di isi nrp -> cuma nrp yg bisa di edit
    //untuk edit all kosongin aja

    //optional -> method function buat tampilin data
    public function tampilkan_data(){
        return $this
        ->db
        ->table($this->table)
        ->orderBy('nrp','DECS')
        ->get()
        ->getResult();

    }

    public function tambah_data($data){
        return $this->insert($data);
    }


    public function fetch_data($nrp){
            return $this
            ->where('nrp',$nrp)
            ->first();
            // Select * FROM 'admin' WHERE nrp = '$nrp'
    }

    public function edit_data($data){
        return $this
        ->set([
            'username' => $data['Username'],
            'email' => $data['Email'],
            'password' => $data['Password'],
            
        ])
        ->where("nrp", $data['Nrp'])
        ->update();
    }
     // UPDATE `kelas` SET Nama = '".$data['nama']."', Nilai = 
        // '".$data['nilai']."' WHERE NRP = '".$data['nrp']."'


    public function hapus_data($nrp){
        return $this->where('nrp',$nrp)->delete();
    }

    public function check_user($nrp,$password){
        return $this
        ->where('nrp',$nrp)
        ->where('password',$password)
        ->first();
    }

}
