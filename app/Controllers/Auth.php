<?php

namespace App\Controllers;
use \App\Models\AuthModel;

class Auth extends BaseController
{
    function __construct() {
        helper('form');
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        return view('admin_layout/signin');
    }

    public function signin() {

        $validation =  \Config\Services::validation();
        $validation->setRules([
            'email' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'email tidak boleh kosong',
                ],
            ],
            'password' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'password tidak boleh kosong'
                ],
            ],
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();
        
        $Auth = new AuthModel;
        if ($isDataValid) {
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            $u = ['email' => $email];
            $q = $Auth->where($u)->first();
            $id = $q['idadmin'];

            if ($q) {
                if ($q['status_act'] == 1) {
                    if (password_verify($password, $q['password'])) {
                        session()->set('username',$q['username']);
                        session()->set('email',$q['email']);

                        $data = [
                            "last_active" => date('Y-m-d H:i:s')
                        ];
                        $Auth->update($id, $data);

                        return redirect()->to('/dashboard');
                    } else {
                        session()->setFlashdata('error', '<div class="alert alert-warning">Login Tidak Berhasil!</div>');
                        return redirect()->to('/login666');
                    }
                } 
                else {
                    session()->setFlashdata('error', '<div class="alert alert-danger">Akun BELUM AKTIF!</div>');
                    return redirect()->to('/login666');
                }
            }
        } else{
            session()->setFlashdata('error', '<div class="alert alert-danger">Akun TIDAK DIKENAL!</div>');
            return redirect()->to('/login666');
        }
        return redirect()->to('/login666');
    }

    public function register() {
        return view('admin_layout/register');
    }

    public function save_register() {

        $validation =  \Config\Services::validation();
        $validation->setRules([
            'username' => [
                'rules'  => 'required|max_length[30]|is_unique[admin.username]',
                'errors' => [
                    'required' => 'username tidak boleh kosong',
                    'max_length' => 'username melebihi batas karakter',
                    'is_unique' => 'username sudah digunakan'
                ],
            ],
            'email' => [
                'rules'  => 'required|max_length[254]|valid_email|is_unique[admin.email]',
                'errors' => [
                    'required' => 'email tidak boleh kosong',
                    'valid_email' => 'email tidak benar',
                    'is_unique' => 'email sudah digunakan',
                ],
            ],
            'password1' => [
                'rules'  => 'required|min_length[6]',
                'errors' => [
                    'required' => 'password tidak boleh kosong',
                    'min_length' => 'password terlalu pendek',
                ],
            ],
            'password2' => [
                'rules'  => 'required|min_length[6]|matches[password1]',
                'errors' => [
                    'required' => 'password tidak boleh kosong',
                    'min_length' => 'password terlalu pendek',
                    'matches' => 'password tidak sesuai',
                ],
            ]
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();

        if($isDataValid){
            $auth = new AuthModel();
            $auth->insert([
                "username" => $this->request->getPost('username'),
                "email" => $this->request->getPost('email'),
                "password" => password_hash($this->request->getPost('password1'),PASSWORD_DEFAULT),
                // "password" => $this->request->getPost('password1'),
                "status_act" => 1,
                "role_id" => 1,
            ]);
            session()->setFlashdata('message', '<div class="alert alert-success">Registrasi BERHASIL, silahkan Login!</div>');
            return redirect()->to('register');
        } else{
            session()->setFlashdata('message', '<div class="alert alert-danger">Registrasi GAGAL!</div>');
            return redirect()->to('register');
        }

            // tampilkan form create
            echo view('admin_layout/register');
    }

    public function logout(){
        $session = session();
        $session->destroy();
        return redirect()->to('/login666');
    }
}
