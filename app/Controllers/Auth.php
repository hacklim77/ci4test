<?php

namespace App\Controllers;
use \App\Models\AuthModel;

class Auth extends BaseController
{
    function __construct() {
        // helper('form');
    }

    public function index()
    {
        return view('admin_layout/signin');
    }

    public function register() {
        return view('admin_layout/register');
    }

    public function save_register() {

        $validation =  \Config\Services::validation();
        $validation->setRules([
            'username' => [
                'rules'  => 'required|max_length[30]',
                'errors' => [
                    'required' => 'username tidak boleh kosong',
                    'max_length' => 'username melebihi batas karakter',
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
                "status" => 1,
                "role_id" => 1,
            ]);
            return redirect()->to('register');
        } else{
            // session()->setFlashdata('errors');
            // $errors = $validation->getErrors;
        }

            // tampilkan form create
            echo view('admin_layout/register');
    }
}
