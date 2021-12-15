<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
	public function cekUser($name, $pass)
	{
		$dataUser = $this->db->table('admin')->where(['name_admin' => $name, 'pass' => $pass])->get()->getRowArray();
		if ($dataUser != null) {
			$pos = [
				'stts' => true,
				'data' => $dataUser,
				'msg' => 'anda berhasil login!'
			];
		} else {
			$pos = [
				'stts' => false,
				'msg' => 'data yang anda masukkan salah mohon di cek kembali!'
			];
		}

		return $pos;
	}

	public function addUser($data)
	{
		return $this->db->table('tbl_user')->insert($data);
	}

	public function getUser()
	{
		return $this->db->table('tbl_user')->get()->getResultArray();
	}

	public function addProduc($data)
	{
		return $this->db->table('tbl_produc')->insert($data);
	}

	public function getProduc($id = null)
	{
		if (!$id) {
			return $this->db->table('tbl_produc')
				->select('tbl_produc.*, tbl_user.name_com')
				->join('tbl_user', 'tbl_user.id = tbl_produc.user_id')
				->orderBy('name_com', 'ASC')
				->get()->getResultArray();
		} else {
			return $this->db->table('tbl_produc')
				->select('tbl_produc.*, tbl_user.name_com')
				->join('tbl_user', 'tbl_user.id = tbl_produc.user_id')
				->where(['tbl_produc.user_id' => $id])
				->orderBy('name_com', 'ASC')
				->get()->getResultArray();
		}
	}

	public function getOneProduc($id)
	{
		return $this->db->table('tbl_produc')
			->select('tbl_produc.*, tbl_user.name_com')
			->join('tbl_user', 'tbl_user.id = tbl_produc.user_id')
			->where(['tbl_produc.id' => $id])
			->orderBy('name_com', 'ASC')
			->get()->getRowArray();
	}

	public function deleteProduc($id)
	{
		return $this->db->table('tbl_produc')->where(['id' => $id])->delete();
	}

	public function deleteUser($id)
	{
		$this->db->table('tbl_produc')->where(['user_id' => $id])->delete();
		return $this->db->table('tbl_user')->where(['id' => $id])->delete();
	}

	public function getStaff()
	{
		return $this->db->table('admin')->get()->getResultArray();
	}

	public function addAdmin($data)
	{
		return $this->db->table('admin')->insert($data);
	}

	public function deleteAdmin($id)
	{
		return $this->db->table('admin')->where(['id' => $id])->delete();
	}

	public function saveJob($data)
	{
		return $this->db->table('list_riport')->insert($data);
	}

	public function updateJob($id, $data)
	{
		return $this->db->table('list_riport')
			->where(['id' => $id])
			->update($data);
	}

	public function getPost()
	{
		return $this->db->table('list_riport')
			->select('list_riport.*, tbl_produc.name_produc, tbl_produc.code, tbl_user.name_com, admin.name_admin')
			->join('tbl_produc', 'tbl_produc.id = list_riport.produc_id')
			->join('admin', 'admin.id = list_riport.admin_id')
			->join('tbl_user', 'tbl_user.id = tbl_produc.user_id')
			->orderBy('list_riport.id', 'ASC')
			->get()->getResultArray();
	}

	public function getPostDay($id, $admin_id)
	{
		// helper('date');
		// date_default_timezone_set('Asia/Jakarta');
		$tgl = date('Y-m-d');
		// return $this->db->query("SELECT * FROM list_riport WHERE tgl_post = '$tgl'")->getResultArray();
		// return $tgl;
		return $this->db->table('list_riport')
			->where(['produc_id' => $id])
			->where(['admin_id' => $admin_id])
			->where(["tgl_post" => "$tgl"])
			->get()->getRowArray();
	}
}
