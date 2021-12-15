<?php

namespace App\Controllers;

use App\Models\UserModel;

class Home extends BaseController
{

	public function __construct()
	{
		$this->UserModel = new UserModel();
		$this->sesi = session()->get('stts');
	}

	public function index()
	{
		$data = ['com' => count($this->UserModel->getUser())];
		return view('conten/home', $data);
	}

	public function data_staff()
	{
		if ($this->sesi != 1)
			return redirect()->to(base_url('home'));

		$data = [
			'staff' => $this->UserModel->getStaff(),
		];
		return view('conten/staff', $data);
	}

	public function tambah_admin()
	{
		if ($this->sesi != 1)
			return redirect()->to(base_url('home'));
		$data = [
			'name_admin' => $this->request->getVar('name'),
			'pass' => $this->request->getVar('pass'),
			'stts' => $this->request->getVar('stts')
		];
		// dd($data);
		$this->UserModel->addAdmin($data);
		session()->setFlashdata('pesan', "<div class='alert alert-danger' id='alert' role='alert'>Data di simpan!</div>");
		return redirect()->to(base_url('home/data_staff'));
	}

	public function delete_staff($id)
	{
		if ($this->sesi != 1)
			return redirect()->to(base_url('home'));

		$this->UserModel->deleteAdmin($id);
		session()->setFlashdata('pesan', "<div class='alert alert-danger' id='alert' role='alert'>Data di hapus!</div>");
		return redirect()->to(base_url('home/data_staff'));
	}

	public function data_master()
	{
		if ($this->sesi != 1)
			return redirect()->to(base_url('home'));

		$data = [
			'compeny' => $this->UserModel->getUser(),
			'produc' => $this->UserModel->getProduc(),
		];

		return view('conten/data_master', $data);
	}

	public function user()
	{
		if ($this->sesi != 1)
			return redirect()->to(base_url('home'));

		return view('conten/user');
	}

	public function tambah_user()
	{
		if ($this->sesi != 1)
			return redirect()->to(base_url('home'));

		$data = [
			'name_com' => $this->request->getVar('name_com')
		];
		$this->UserModel->addUser($data);
		session()->setFlashdata('pesan', "<div class='alert alert-danger' id='alert' role='alert'>Data di simpan!</div>");
		return redirect()->to(base_url('home/data_master'));
	}

	public function tambah_produc()
	{
		if ($this->sesi != 1)
			return redirect()->to(base_url('home'));

		$data = [
			'user_id' => $this->request->getVar('user_id'),
			'code' => $this->request->getVar('code'),
			'jbl_pack' => $this->request->getVar('jbl_pack'),
			'name_produc' => $this->request->getVar('name_produc'),
		];
		// dd($data);
		$this->UserModel->addProduc($data);
		session()->setFlashdata('pesan', "<div class='alert alert-danger' id='alert' role='alert'>Data di simpan!</div>");
		return redirect()->to(base_url('home/data_master'));
	}

	public function delete_produc($id)
	{
		if ($this->sesi != 1)
			return redirect()->to(base_url('home'));

		$this->UserModel->deleteProduc($id);
		session()->setFlashdata('pesan', "<div class='alert alert-danger' id='alert' role='alert'>Data di hapus!</div>");
		return redirect()->to(base_url('home/data_master'));
	}

	public function delete_user($id)
	{
		if ($this->sesi != 1)
			return redirect()->to(base_url('home'));

		$this->UserModel->deleteUser($id);
		session()->setFlashdata('pesan', "<div class='alert alert-danger' id='alert' role='alert'>Data di hapus!</div>");
		return redirect()->to(base_url('home/data_master'));
	}



	//user menu
	public function Scan($id)
	{
		if ($this->sesi != 2)
			return redirect()->to(base_url('home'));

		$data = ['pro' => $this->UserModel->getOneProduc($id)];

		return view('conten/scan', $data);
	}

	public function produc($id = null)
	{
		if ($this->sesi != 2)
			return redirect()->to(base_url('home'));

		$data = [
			'compeny' => $this->UserModel->getUser(),
			'produc' => $this->UserModel->getProduc($id),
		];
		return view('conten/produc', $data);
	}

	public function company()
	{
		if ($this->sesi != 2)
			return redirect()->to(base_url('home'));

		$data = [
			'compeny' => $this->UserModel->getUser(),
			'produc' => $this->UserModel->getProduc(),
		];
		return view('conten/company', $data);
	}


	public function save_job()
	{
		if ($this->sesi != 2)
			return redirect()->to(base_url('home'));
		if ($this->request->isAJAX()) {

			$last_post = $this->UserModel->getPostDay($this->request->getVar('produc_id'), $this->request->getVar('admin_id'));
			$jml = $this->request->getVar('jumlah');
			if ($last_post) {
				$data = [
					'admin_id' => $this->request->getVar('admin_id'),
					'produc_id' => $this->request->getVar('produc_id'),
					'jumlah' =>  $jml + $last_post['jumlah'],
				];
				$this->UserModel->updateJob($last_post['id'], $data);
				$msg = [
					'data' => true
				];
			} else {
				$data = [
					'admin_id' => $this->request->getVar('admin_id'),
					'produc_id' => $this->request->getVar('produc_id'),
					'jumlah' => $jml,
				];
				$this->UserModel->saveJob($data);
				$msg = [
					'data' => true
				];
			}
		}

		echo json_encode($msg);
	}

	public function post_list()
	{
		$data = [
			'post' => $this->UserModel->getPost(),
		];
		// dd($data);
		return view('conten/post', $data);
	}

	public function test()
	{
		dd($this->UserModel->getPostDay(45, 6));
	}
}
