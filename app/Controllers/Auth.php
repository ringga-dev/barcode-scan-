<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

class Auth extends Controller
{
    public function __construct()
    {
        $this->UserModel = new UserModel();
    }


    public function index()
    {
        session();
        return view('auth/login');
    }

    public function cek_data()
    {
        $username = $this->request->getVar('name');
        $pass = $this->request->getVar('pass');

        $data = $this->UserModel->cekUser($username, $pass);
        // dd($data);
        $pesan = $data['msg'];
        if ($data['stts'] == false) {
            session()->setFlashdata('pesan', "<div class='alert alert-danger' role='alert'>$pesan!</div>");
            return redirect()->to(base_url('auth'));
        } else {
            $sesi = [
                'user' => $data['data']['name_admin'],
                'id' => $data['data']['id'],
                'stts' => $data['data']['stts'],
                'logged_id' => true
            ];
            session()->set($sesi);
            return redirect()->to(base_url('home'));
        }
    }

    public function logout()
    {
        session()->remove('user');
        session()->remove('id');
        session()->remove('stts');
        session()->remove('logged_id');
        session()->setFlashdata('pesan', "<div class='alert alert-success' role='alert'>Anda LOGOUT!</div>");
        return redirect()->to('/auth');
    }
}
