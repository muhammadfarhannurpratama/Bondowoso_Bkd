<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Frontend extends Ci_Controller {

	public function index()
	{
		$this->load->view('index');
	}

	public function login()
	{
		if (!empty($_SESSION['userdata'])){
			if ($_SESSION['userdata']['jenis'] == 'admin'){
				redirect('admin');
			}
			
			if($_SESSION['userdata']['jenis'] == 'bagian'){
				redirect('bagian');	
			}

			if ($_SESSION['userdata']['jenis'] == 'kepala'){
				redirect('kepala');
			}

		}else {}

		$this->form_validation->set_rules('username', 'username', 'trim|required');
		$this->form_validation->set_rules('password', 'password', 'trim|required');

		if ($this->form_validation->run() == false) {
			$this->load->view('login');
		} else {
			//validasinya sukses
			$this->_masuk();
		}
	}

	private function _masuk()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');


		$usermin = $this->db->get_where('tb_admin', ['username_admin' => $username])->row_array();
		$userbag = $this->db->get_where('tb_bagian', ['username_admin_bagian' => $username])->row_array();
		$userkep = $this->db->get_where('tb_kepala', ['username_admin_kepala' => $username])->row_array();

		//jika usernya ada
		if ($usermin) {
			//jika usernya aktif
			//cek password
			$pass = $usermin['password'];
			if (password_verify($password, $pass)) {
				$nama_admin = $usermin['nama_admin'];
				$gambar = $usermin['gambar'];
				$datanya = [
					'nama' => $nama_admin,
					'jenis' => 'admin',
					'gambar' => $gambar
					];
				$session = array('userdata' => $datanya,
								'status' => "Loged in" 
							);
				$this->session->set_userdata($session);
				redirect('admin/index');
			} else {
				$this->session->set_flashdata(
					'message',
					'<div class="alert alert-danger" role="alert">password yang anda masukan salah!</div>'
				);
				redirect('frontend/login');
			}
		}
		else if ($userbag){
			$pass = $userbag['password_bagian'];
			if (password_verify($password, $pass)) {
				$nama_bagian = $userbag['nama_bagian'];
				$gambarbag = $userbag['gambar'];
				$datanya = [
					'nama' => $nama_bagian,
					'jenis' => 'bagian',
					'gambar' => $gambarbag
					];
				$session = array('userdata' => $datanya,
								'status' => "Loged in" 
							);
				$this->session->set_userdata($session);
				redirect('bagian/index');
			} else {
				$this->session->set_flashdata(
					'message',
					'<div class="alert alert-danger" role="alert">password yang anda masukan salah!</div>'
				);
				redirect('frontend/login');
			}	

		}
		else if ($userkep){
			$pass = $userkep['password'];
			if (password_verify($password, $pass)) {
				$nama_kepala = $userkep['nama_kepala'];
				$gambarkep = $userkep['gambar'];
				$datanya = [
					'nama' => $nama_kepala,
					'jenis' => 'kepala',
					'gambar' => $gambarkep
					];
				$session = array('userdata' => $datanya,
								'status' => "Loged in" 
							);
				$this->session->set_userdata($session);
				redirect('kepala/index');
			} else {
				$this->session->set_flashdata(
					'message',
					'<div class="alert alert-danger" role="alert">password yang anda masukan salah!</div>'
				);
				redirect('frontend/login');
			}
		}
		 else {
			$this->session->set_flashdata(
				'message',
				'<div class="alert alert-danger" role="alert">Akun anda tidak ditemukan!</div>'
			);
			redirect('home/login');
		}
	}

	public function logout() {
		$this->session->sess_destroy();
		redirect('frontend/login');
	}

}
