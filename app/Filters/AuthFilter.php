<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthFilter implements FilterInterface
{

	public function before(RequestInterface $request, $arguments = null)
	{
		// kondisi 
		if (session()->get('logged_id') != true) {
			session()->setFlashdata('pesan', "<div class='alert alert-danger' role='alert'>Anda Belum Melakukan Login!</div>");
			return redirect()->to('auth');
		}
	}


	public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
	{
		if (session()->get('logged_id') == true) {
			return redirect()->to('home');
		}
	}
}
