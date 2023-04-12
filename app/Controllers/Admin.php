<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AdminInputModel;

class Admin extends BaseController
{
    //untuk masukkan model ke controller
    private $model;
    public function __construct()
    {
     $this->model = new AdminInputModel();   
    }

    // read
    public function index()
    {
        $data['title'] = "Input Admin";
        $data['data_admin'] = $this->model->tampilkan_data();
        return view("admin/admin.php", $data);
    }



    public function tambah(){
        $data['title'] = "Input Admin";
        if (isset($_POST['submit']))
        {
            $validasi = [
                'Nrp' => [
                    'rules' => 'min_length[9]|max_length[9]|is_unique[user.nrp]',
                    'errors' => [
                        'min_length' => 'NRP harus 9 karakter!',
                        'max_length' => 'NRP harus 9 karakter!',
                        'is_unique' => 'NRP yang ditambahkan, telah digunakan!'
                    ]
                ],
                'Username' => [
                    'rules' => 'min_length[3]|max_length[30]',
                    'errors' => [
                        'min_length' => 'Nama minimal 3 dan maksimal 30 karakter',
                        'max_length' => 'Nama minimal 3 dan maksimal 30 karakter',
                    ]
                ],

                
                'Email' => [
                    'rules' => 'min_length[3]|max_length[30]',
                    'errors' => [
                        'min_length' => 'Email minimal 3 dan maksimal 30 karakter',
                        'max_length' => 'Email minimal 3 dan maksimal 30 karakter',
                    ]
                ],

                'Password' => [
                    'rules' => 'min_length[3]|max_length[30]|',
                    'errors' => [
                        'min_length' => 'Password minimal 3 dan maksimal 30 karakter',
                        'max_length' => 'Password minimal 3 dan maksimal 30 karakter',
                    ]
                ]
               
                
            ];


            $error = false;
            $error_val = [];

            if (!$this->validate($validasi))
            {
                $error = true;
                $error_val = $this->validator->getErrors();
            }

            if ($error)
                return redirect()
                    ->to(site_url('admin/signUp'))
                    ->with('error_val', $error_val)
                    ->withInput();

            //memasukkan ke table
            $this->model->tambah_data([
                'nrp' => $this->request->getVar('Nrp'),
                'username' => $this->request->getVar('Username'),
                'email' => $this->request->getVar('Email'),
                'password' => $this->request->getVar('Password')
            ]);
        
            if ($this->model->db->affectedRows() > 0)
                return redirect()
                    ->to(site_url('admin/signUp'))
                    ->with('msg_success', 'User telah berhasil didaftarkan');

            return redirect()
                ->to(site_url('admin/signUp'))
                ->with('msg_error', 'User gagal didaftarkan');

        }
        return view('admin/tambah', $data);
    }

   
    public function sunting($nrp){
        $data['title'] = "Input Admin";
        $data['fetch_data'] = $this->model-> fetch_data($nrp);
        

        //update data
        if($this->request->getPost('submit')== 'ya'){
              $validasi = [
                
                'Username' => [
                    'rules' => 'min_length[3]|max_length[30]',
                    'errors' => [
                        'min_length' => 'Nama minimal 3 dan maksimal 30 karakter',
                        'max_length' => 'Nama minimal 3 dan maksimal 30 karakter',
                    ]
                ],

                
                'Email' => [
                    'rules' => 'min_length[3]|max_length[30]',
                    'errors' => [
                        'min_length' => 'Email minimal 3 dan maksimal 30 karakter',
                        'max_length' => 'Email minimal 3 dan maksimal 30 karakter',
                    ]
                ],
                'Password' => [
                    'rules' => 'min_length[3]|max_length[30]|',
                    'errors' => [
                        'min_length' => 'Password minimal 3 dan maksimal 30 karakter',
                        'max_length' => 'Password minimal 3 dan maksimal 30 karakter',
                    ]
                ]

            ];


            $error = false;
            $error_val = [];

            if (!$this->validate($validasi))
            {
                $error = true;
                $error_val = $this->validator->getErrors();
            }

            if ($error)
                return redirect()
                    ->to(site_url('admin/sunting/'.$nrp))
                    ->with('error_val', $error_val)
                    ->withInput();
                     //updating
            $update_data = $this->model->edit_data([
                'Nrp' => $nrp,
                'Username' => $this->request->getVar('Username'),
                'Email' => $this->request->getVar('Email'),
                'Password'=> $this->request->getVar('Password'),
                
            ]);

            if ($update_data){
            return redirect()
                ->to(site_url('admin/sunting/'.$nrp))
                ->with('msg_success', 'Data berhasil diubah');
            }

            return redirect()
                ->to(site_url('admin/tambah'))
                ->with('msg_error', 'Data gagal ditambahkan');
        }

       

            

        return view('admin/sunting.php', $data);
    }


    public function hapus(){
      echo"lah"
;
       if($this->request->getPost('submit')== 'ya'){
      
        $nrp = $this->request->getVar('nrp_delete');

        $delete_data = $this->model->hapus_data($nrp);


        
        if ($delete_data){
            return redirect()
                ->to(site_url('admin'))
                ->with('delete_success', 'Data berhasil dihapus');
            }

            return redirect()
                ->to(site_url('admin'))
                ->with('delete_error', 'Data gagal dihapus');
                
        
       }
        
    
    }



    // Authentifikasi
    public function login(){
        $data['title'] = 'Login Page';


        if($this->request->getPost('login')=='ya'){
            $nrp = $this->request->getVar('Nrp');
            $password = $this->request->getVar('Password');

            $check_user= $this->model->check_user($nrp,$password); 
            
            if ($check_user){
                return redirect()
                    ->to(site_url('home'))
                    ->with('login_success', 'Berhasil Login');
                }
    
                return redirect()
                    ->to(site_url('login'))
                    ->with('msg_error', 'Periksa Kembali nrp atau password anda')
                    ->withInput();
            
           
        }

        return view('admin/login.php',$data);
      
    }


    public function home(){
        return view('admin/home');
    }
}
