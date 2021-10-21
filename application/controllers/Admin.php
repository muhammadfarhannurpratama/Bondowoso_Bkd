<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends Auth_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('M_admin', 'admin');
		if($this->userdata['jenis'] != 'admin'){
			redirect('frontend/login');
		}
	}


	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['bagian'] = $this->admin->jumlah('tb_bagian');
		$data['surat_keluar'] = $this->admin->jumlah('tb_suratkeluar');
		$data['surat_masuk'] = $this->admin->jumlah('tb_suratmasuk');

		
		$this->load->view('admin/index', $data);
	}

	// surat masuk
	public function surat_masuk()
	{	
		$data['title'] = 'Data Surat Masuk';
		$data['surat_masuk'] = $this->admin->tampil_suratmasuk()->result();

		
		$this->load->view('admin/v_SM', $data);
	}

	public function tambahSM()
	{
		$data['title'] = 'Tambah Data Surat Masuk';
		$disposisi = $this->admin->disposisi()->result();
		$data['disposisi'] = $disposisi;
		$data['nomorurut_suratmasuk'] = $this->_ambil_nomorSM();

		$this->load->view('admin/v_SMtambah', $data);
	
	}

	public function tambah_prosesSM()
	{		
		if ($this->input->method() === 'post') {
		
			$rules = $this->admin->rulesSM();
			$this->form_validation->set_rules($rules);
			
			
			$this->load->library('form_validation');
			if ($this->form_validation->run() == FALSE) {
				$data['title'] = 'Tambah Data Surat Masuk';
				$disposisi = $this->admin->disposisi()->result();
				$data['disposisi'] = $disposisi;
				$data['nomorurut_suratmasuk'] = $this->_ambil_nomorSM();

				return $this->load->view('admin/v_SMtambah', $data);
			}
		
			$tanggalmasuk_suratmasuk = $this->input->post('tanggalmasuk_suratmasuk');
			$tanggalsurat_suratmasuk = $this->input->post('tanggalsurat_suratmasuk');
			$tanggal_disposisi1 = $this->input->post('tanggal_disposisi1');
			$tanggal_disposisi2 = $this->input->post('tanggal_disposisi2');
			$tanggal_disposisi3 = $this->input->post('tanggal_disposisi3');
			$nomorurut_suratmasuk = $this->input->post('nomorurut_suratmasuk');

			$tgl_masuk                  = date('Y-m-d H:i:s', strtotime($tanggalmasuk_suratmasuk));
			$tgl_surat                  = date('Y-m-d', strtotime($tanggalsurat_suratmasuk));
			$tgl_disp1                  = date('Y-m-d H:i:s', strtotime($tanggal_disposisi1));
			$tgl_disp2                  = date('Y-m-d H:i:s', strtotime($tanggal_disposisi2));
			$tgl_disp3                  = date('Y-m-d H:i:s', strtotime($tanggal_disposisi3));

			date_default_timezone_set('Asia/Jakarta'); 
					$thnNow = date("Y");

			$nama_file_lengkap 		= $_FILES['file_suratmasuk']['name'];
			$nama_file 		= substr($nama_file_lengkap, 0, strripos($nama_file_lengkap, '.'));
			$ext_file		= substr($nama_file_lengkap, strripos($nama_file_lengkap, '.'));
			$tipe_file 		= $_FILES['file_suratmasuk']['type'];
			$ukuran_file 	= $_FILES['file_suratmasuk']['size'];
			$tmp_file 		= $_FILES['file_suratmasuk']['tmp_name'];
			if($ukuran_file > 10340000){
				$data['error'] = 'file gambar terlalu besar';
			}
			$nama_baru = $thnNow.'-'.$nomorurut_suratmasuk . $ext_file;
			$path = $_SERVER['DOCUMENT_ROOT'].'/E-Surat_BKD_Bondowoso/assets/backend/surat_masuk/'.$nama_baru;
			move_uploaded_file($tmp_file, $path);

					$tanggal_entry  = date("Y-m-d H:i:s");
					
					$SM_baru = [
						'tanggalmasuk_suratmasuk' => $tgl_masuk,
						'kode_suratmasuk' => $this->input->post('kode_suratmasuk'),
						'nomorurut_suratmasuk' => $this->input->post('nomorurut_suratmasuk'),
						'nomor_suratmasuk' => $this->input->post('nomor_suratmasuk'),
						'tanggalsurat_suratmasuk' => $tgl_surat,
						'pengirim' => $this->input->post('pengirim'),
						'kepada_suratmasuk' => $this->input->post('kepada_suratmasuk'),
						'perihal_suratmasuk' => $this->input->post('perihal_suratmasuk'),
						'file_suratmasuk' => $nama_baru,
						'operator' => $this->input->post('operator'),
						'tanggal_entry' => $tanggal_entry,
						'disposisi1' => $this->input->post('disposisi1'),
						'tanggal_disposisi1' => $tgl_disp1,
						'disposisi2' => $this->input->post('disposisi2'),
						'tanggal_disposisi2' => $tgl_disp2,
						'disposisi3' => $this->input->post('disposisi3'),
						'tanggal_disposisi3' => $tgl_disp3
					];

					$result = $this->admin->SM_tambah($SM_baru);
					if ($result > 0) {
						$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible show" role="alert">
							Data Surat Masuk berhasil ditambahkan.
							<a href="#" class="close text-white" data-dismiss="alert" aria-label="close">&times;</a>
						</button></div>');
						redirect("admin/surat_masuk");
					} else {
						$data['error'] = 'Data Mahasiswa Gagal ditambahkan';
						var_dump($result);
					}
			}
		
	}

	public function editSM($id)
	{
		$data['surat_masuk'] = $this->admin->SM_by_id($id);
		$data['title'] = 'Edit data Surat Masuk';

		// $disposisi = $this->admin->disposisi()->result();
		$data['disposisi'] = $this->admin->disposisi()->result();

		$this->load->view('admin/v_SMedit', $data);
	}

	public function edit_prosesSM() 
	{
		if ($this->input->method() === 'post') {
		
			$rules = $this->admin->rulesSM();
			$this->form_validation->set_rules($rules);
			
			
			$this->load->library('form_validation');
			if ($this->form_validation->run() == FALSE) {
				$data['title'] = 'Tambah Data Surat Masuk';
				$disposisi = $this->admin->disposisi()->result();
				$data['disposisi'] = $disposisi;
				$data['nomorurut_suratmasuk'] = $this->_ambil_nomorSM();
				$id = $this->input->post('id_suratmasuk');
				$data['surat_masuk'] = $this->admin->SM_by_id($id);

				return $this->load->view('admin/v_SMedit', $data);
			}
			date_default_timezone_set('Asia/Jakarta'); 
					$thnNow = date("Y");
			$nomorurut_suratmasuk = $this->input->post('nomorurut_suratmasuk');

			if(!empty($_FILES['file_suratmasuk']['name'])){		
				

				//delete file
				$SM = $this->admin->SM_by_id($this->input->post('id_suratmasuk'));
				if(file_exists('assets/backend/surat_masuk/'.$SM->file_suratmasuk) && $SM->file_suratmasuk) {
					unlink('assets/backend/surat_masuk/'.$SM->file_suratmasuk);
				}
					$nama_file_lengkap 		= $_FILES['file_suratmasuk']['name'];
					$nama_file 		= substr($nama_file_lengkap, 0, strripos($nama_file_lengkap, '.'));
					$ext_file		= substr($nama_file_lengkap, strripos($nama_file_lengkap, '.'));
					$tipe_file 		= $_FILES['file_suratmasuk']['type'];
					$ukuran_file 	= $_FILES['file_suratmasuk']['size'];
					$tmp_file 		= $_FILES['file_suratmasuk']['tmp_name'];
					if($ukuran_file > 10340000){
						$data['error'] = 'file gambar terlalu besar';
					}
					$nama_baru = $thnNow.'-'.$nomorurut_suratmasuk . $ext_file;
					$path = $_SERVER['DOCUMENT_ROOT'].'/E-Surat_BKD_Bondowoso/assets/backend/surat_masuk/'.$nama_baru;
					move_uploaded_file($tmp_file, $path);

				$SM_edit['file_suratmasuk'] = $nama_baru;
			}else{
				$SM_edit['file_suratmasuk'] = $this->input->post('file_lama');
			}
			$tanggalmasuk_suratmasuk = $this->input->post('tanggalmasuk_suratmasuk');
			$tanggalsurat_suratmasuk = $this->input->post('tanggalsurat_suratmasuk');
			$tanggal_disposisi1 = $this->input->post('tanggal_disposisi1');
			$tanggal_disposisi2 = $this->input->post('tanggal_disposisi2');
			$tanggal_disposisi3 = $this->input->post('tanggal_disposisi3');
			

			$tgl_masuk                  = date('Y-m-d H:i:s', strtotime($tanggalmasuk_suratmasuk));
			$tgl_surat                  = date('Y-m-d', strtotime($tanggalsurat_suratmasuk));
			$tgl_disp1                  = date('Y-m-d H:i:s', strtotime($tanggal_disposisi1));
			$tgl_disp2                  = date('Y-m-d H:i:s', strtotime($tanggal_disposisi2));
			$tgl_disp3                  = date('Y-m-d H:i:s', strtotime($tanggal_disposisi3));

			

			$tanggal_entry  = date("Y-m-d H:i:s");
					
			$SM_edit = [
				'tanggalmasuk_suratmasuk' => $tgl_masuk,
				'kode_suratmasuk' => $this->input->post('kode_suratmasuk'),
				'nomorurut_suratmasuk' => $this->input->post('nomorurut_suratmasuk'),
				'nomor_suratmasuk' => $this->input->post('nomor_suratmasuk'),
				'tanggalsurat_suratmasuk' => $tgl_surat,
				'pengirim' => $this->input->post('pengirim'),
				'kepada_suratmasuk' => $this->input->post('kepada_suratmasuk'),
				'perihal_suratmasuk' => $this->input->post('perihal_suratmasuk'),
				'operator' => $this->input->post('operator'),
				'tanggal_entry' => $tanggal_entry,
				'disposisi1' => $this->input->post('disposisi1'),
				'tanggal_disposisi1' => $tgl_disp1,
				'disposisi2' => $this->input->post('disposisi2'),
				'tanggal_disposisi2' => $tgl_disp2,
				'disposisi3' => $this->input->post('disposisi3'),
				'tanggal_disposisi3' => $tgl_disp3
			];

			$id_suratmasuk  =  $this->input->post('id_suratmasuk');

			$result = $this->admin->SM_edit($SM_edit, $id_suratmasuk);

			if ($result > 0) {
				$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible show" role="alert">
					Data Surat Masuk berhasil diubah.
					<a href="#" class="close text-white" data-dismiss="alert" aria-label="close">&times;</a>
				</button></div>');
				redirect('admin/surat_masuk');
			} else {
				$data['error'] = 'Data Surat Masuk Gagal diubah!';
			}
		}
	}

	public function hapusSM($id)
	{
		$SMlist = $this->admin->SM_by_id($id);
		var_dump($SMlist);
		
		$data = array('id_suratmasuk' => $SMlist->id_suratmasuk
						 );
		unlink('assets/backend/surat_masuk/'.$SMlist->file_suratmasuk);
		$hapusSM = $this->admin->SM_hapus($data['id_suratmasuk']);
			
	
			

		if ($hapusSM > 0) {

			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible show" role="alert">
					Data Surat Masuk berhasil dihapus.
					<a href="#" class="close text-white" data-dismiss="alert" aria-label="close">&times;</a>
				</button></div>');
				redirect("admin/surat_masuk");
			
		} else {
			$this->session->set_flashdata(
				'message',
				'<div class="alert alert-danger" role="alert">Data Gagal Diubah!</div>'
				);
		}
	}

	private function _ambil_nomorSM() 
	{
		$data1 = $this->admin->nomorSM()->result();
		$jumlah = $this->admin->nomorSM()->num_rows();
		$nomor = $data1[0]->nomorurut_suratmasuk;

		if ($jumlah =0){
			$nomorbaru = "0001";
		} else {
			$nomormax = substr($nomor,0,4);
			$nomorbaru = intval($nomormax)+1;
		}

		
		return $nomorbaru;
	}
	// tutup surat masuk

	// surat keluar
	public function surat_keluar()
	{	
		$data['title'] = 'Data Surat Keluar';
		$data['surat_keluar'] = $this->admin->tampil_suratkeluar()->result();	
		$this->load->view('admin/v_SK', $data);
	}

	public function tambahSK()
	{
		$data['title'] = 'Tambah Data Surat Keluar';
		$disposisi = $this->admin->disposisi()->result();
		$data['disposisi'] = $disposisi;
		$data['nomor_suratkeluar'] = $this->_ambil_nomorSK();

		$this->load->view('admin/v_SKtambah', $data);
	
	}

	public function tambah_prosesSK()
	{		
		if ($this->input->method() === 'post') {
		
			$rules = $this->admin->rulesSK();
			$this->form_validation->set_rules($rules);
			
			
			$this->load->library('form_validation');
			if ($this->form_validation->run() == FALSE) {
				$data['title'] = 'Tambah Data Surat Keluar';
				$disposisi = $this->admin->disposisi()->result();
				$data['disposisi'] = $disposisi;
				$data['nomor_suratkeluar'] = $this->_ambil_nomorSK();

				return $this->load->view('admin/v_SKtambah', $data);
			}
		
			$tanggalkeluar_suratkeluar = $this->input->post('tanggalkeluar_suratkeluar');
			$tanggalsurat_suratkeluar = $this->input->post('tanggalsurat_suratkeluar');
			$nomor_suratkeluar = $this->input->post('nomor_suratkeluar');
			$ambilnomor                 = substr("$nomor_suratkeluar",0,4);

			$tgl_keluar                  = date('Y-m-d H:i:s', strtotime($tanggalkeluar_suratkeluar));
			$tgl_surat                  = date('Y-m-d', strtotime($tanggalsurat_suratkeluar));

			date_default_timezone_set('Asia/Jakarta'); 
					$thnNow = date("Y");

			$nama_file_lengkap 		= $_FILES['file_suratkeluar']['name'];
			$nama_file 		= substr($nama_file_lengkap, 0, strripos($nama_file_lengkap, '.'));
			$ext_file		= substr($nama_file_lengkap, strripos($nama_file_lengkap, '.'));
			$tipe_file 		= $_FILES['file_suratkeluar']['type'];
			$ukuran_file 	= $_FILES['file_suratkeluar']['size'];
			$tmp_file 		= $_FILES['file_suratkeluar']['tmp_name'];
			if($ukuran_file > 10340000){
				$data['error'] = 'file dokumen terlalu besar';
			}
			$namaSK_baru = $thnNow.'-'.$ambilnomor . $ext_file;
			$path = $_SERVER['DOCUMENT_ROOT'].'/E-Surat_BKD_Bondowoso/assets/backend/surat_keluar/'.$namaSK_baru;
			move_uploaded_file($tmp_file, $path);

					$tanggal_entry  = date("Y-m-d H:i:s");
					
					$SK_baru = [
						'tanggalkeluar_suratkeluar' => $tgl_keluar,
						'kode_suratkeluar' => $this->input->post('kode_suratkeluar'),
						'nomor_suratkeluar' => $this->input->post('nomor_suratkeluar'),
						'nama_bagian' => $this->input->post('nama_bagian'),
						'tanggalsurat_suratkeluar' => $tgl_surat,
						'kepada_suratkeluar' => $this->input->post('kepada_suratkeluar'),
						'perihal_suratkeluar' => $this->input->post('perihal_suratkeluar'),
						'operator' => $this->input->post('operator'),
						'file_suratkeluar' => $namaSK_baru,
						'tanggal_entry' => $tanggal_entry
					];

					$result = $this->admin->SK_tambah($SK_baru);
					if ($result > 0) {
						$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible show" role="alert">
							Data Surat Keluar berhasil ditambahkan.
							<a href="#" class="close text-white" data-dismiss="alert" aria-label="close">&times;</a>
						</button></div>');
						redirect("admin/surat_keluar");
					} else {
						$data['error'] = 'Data Surat Keluar Gagal ditambahkan';
					}
			}
		
	}


	private function _ambil_nomorSK() 
	{
		$data1 = $this->admin->nomorSK()->result();
		$jumlah = $this->admin->nomorSK()->num_rows();
		$nomor = $data1[0]->nomor_suratkeluar;

		if ($jumlah =0){
			$nomorbaru = "0001";
		} else {
			$nomormax = substr($nomor,0,4);
			$nomorbaru = intval($nomormax)+1;
		}

		
		return $nomorbaru;
	}

	public function editSK($id)
	{
		$data['surat_keluar'] = $this->admin->SK_by_id($id);
		$data['title'] = 'Edit data Surat Keluar';

		// $disposisi = $this->admin->disposisi()->result();
		$data['disposisi'] = $this->admin->disposisi()->result();

		$this->load->view('admin/v_SKedit', $data);
	}

	public function edit_prosesSK() {
		if ($this->input->method() === 'post') {
		
			$rules = $this->admin->rulesSK();
			$this->form_validation->set_rules($rules);
			
			
			// $this->load->library('form_validation');
			// if ($this->form_validation->run() == FALSE) {
			// 	$data['title'] = 'Tambah Data Surat Keluar';
			// 	$disposisi = $this->admin->disposisi()->result();
			// 	$data['disposisi'] = $disposisi;
			// 	$data['nomor_suratkeluar'] = $this->_ambil_nomorSK();

			// 	return $this->load->view('admin/v_SKtambah', $data);
			// }
			date_default_timezone_set('Asia/Jakarta'); 
					
			if(!empty($_FILES['file_suratkeluar']['name'])){		
				

				//delete file
				$SK = $this->admin->SK_by_id($this->input->post('id_suratkeluar'));

				if(file_exists('assets/backend/surat_keluar/'.$SK->file_suratkeluar) && $SK->file_suratkeluar) {
					unlink('assets/backend/surat_keluar/'.$SK->file_suratkeluar);
				}
				
					$nomor_suratkeluar = $this->input->post('nomor_suratkeluar');

					$thnNow = date("Y");
					$ambilnomor                 = substr("$nomor_suratkeluar",0,4);

					$nama_file_lengkapSK 		= $_FILES['file_suratkeluar']['name'];
					$nama_fileSK 		= substr($nama_file_lengkapSK, 0, strripos($nama_file_lengkapSK, '.'));
					$ext_fileSK		= substr($nama_file_lengkapSK, strripos($nama_file_lengkapSK, '.'));
					$tipe_fileSK 		= $_FILES['file_suratkeluar']['type'];
					$ukuran_fileSK 	= $_FILES['file_suratkeluar']['size'];
					$tmp_fileSK 		= $_FILES['file_suratkeluar']['tmp_name'];
					if($ukuran_fileSK > 10340000){
						$data['error'] = 'file dokeumen terlalu besar';
					}
					$nama = $thnNow.'-'.$ambilnomor . $ext_fileSK;
					$pathSK = $_SERVER['DOCUMENT_ROOT'].'/E-Surat_BKD_Bondowoso/assets/backend/surat_keluar/'.$nama;
					move_uploaded_file($tmp_fileSK, $pathSK);

				$SK_edit['file_suratkeluar'] = $nama;
			}else{
				$SK_edit['file_suratkeluar'] = $this->input->post('file_lama');
			}
		
			$tanggalkeluar_suratkeluar = $this->input->post('tanggalkeluar_suratkeluar');
			$tanggalsurat_suratkeluar = $this->input->post('tanggalsurat_suratkeluar');
			

			$tgl_keluar                  = date('Y-m-d H:i:s', strtotime($tanggalkeluar_suratkeluar));
			$tgl_surat                  = date('Y-m-d', strtotime($tanggalsurat_suratkeluar));
			$id_surat = $this->input->post('id_suratkeluar');

			
					$tanggal_entry  = date("Y-m-d H:i:s");
					
					$SK_edit = [
						'tanggalkeluar_suratkeluar' => $tgl_keluar,
						'kode_suratkeluar' => $this->input->post('kode_suratkeluar'),
						'nomor_suratkeluar' => $this->input->post('nomor_suratkeluar'),
						'nama_bagian' => $this->input->post('nama_bagian'),
						'tanggalsurat_suratkeluar' => $tgl_surat,
						'kepada_suratkeluar' => $this->input->post('kepada_suratkeluar'),
						'perihal_suratkeluar' => $this->input->post('perihal_suratkeluar'),
						'operator' => $this->input->post('operator'),
						'tanggal_entry' => $tanggal_entry
					];

					$result = $this->admin->SK_edit($SK_edit, $id_suratkeluar);
					if ($result > 0) {
						$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible show" role="alert">
							Data Surat Keluar berhasil diubah.
							<a href="#" class="close text-white" data-dismiss="alert" aria-label="close">&times;</a>
						</button></div>'.$pathSK);
						redirect("admin/surat_keluar");
					} else {
						$data['error'] = 'Data Surat Keluar Gagal diubah';
					}
			}
	}

	public function hapusSK($id)
	{
		$SKlist = $this->admin->SK_by_id($id);
		var_dump($SKlist);
		
		$data = array('id_suratkeluar' => $SKlist->id_suratkeluar
						 );
		unlink('assets/backend/surat_keluar/'.$SKlist->file_suratkeluar);
		$hapusSK = $this->admin->SK_hapus($data['id_suratkeluar']);
			
	
			

		if ($hapusSK > 0) {

			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible show" role="alert">
					Data Surat KEluar berhasil dihapus.
					<a href="#" class="close text-white" data-dismiss="alert" aria-label="close">&times;</a>
				</button></div>');
				redirect("admin/surat_keluar");
			
		} else {
			$this->session->set_flashdata(
				'message',
				'<div class="alert alert-danger" role="alert">Data Gagal Diubah!</div>'
				);
		}
	}

	//tutup surat keluar

	// data Bagian
	public function bagian ()
	{
		$data['title'] = 'Data Bagian';
		$data['data_bagian'] = $this->admin->tampil_bagian()->result();

		$this->load->view('admin/v_bagian', $data);
	}

	public function bagian_tambah() 
	{
		$data['title'] = 'Tambah Data Bagian';
		$data['error']= ' ';


		$this->load->view('admin/v_bagianTambah', $data);
	}

	public function bagian_proses_tambah()
	{
		if ($this->input->method() === 'post') {
		
			$rules = $this->admin->rulesBagian();
			$this->form_validation->set_rules($rules);
			
			
			$this->load->library('form_validation');
			if ($this->form_validation->run() == FALSE) {
				$data['title'] = 'Tambah Data Surat Bagian';
				$data['error']= ' ';
				return $this->load->view('admin/v_bagianTambah', $data);
			}

			$tgl_lahir                  = date('Y-m-d', strtotime($this->input->post('tanggal_lahir_bagian')));
			$password = password_hash($this->input->post('password_bagian'), PASSWORD_DEFAULT);
			$data_bagian = array('nama_bagian' => $this->input->post('nama_bagian'),
								'username_admin_bagian' => $this->input->post('username_admin_bagian'),
								'password_bagian' => $password,
								'nama_lengkap' => $this->input->post('nama_lengkap'),	
								'tanggal_lahir_bagian' => $tgl_lahir,
								'alamat' => $this->input->post('alamat'),
								'no_hp_bagian' => $this->input->post('no_hp_bagian')
							 );
			// upload gambar
			if (!empty($_FILES['gambar']['name'])) {
				$upload = $this->_do_upload();
				$data_bagian['gambar'] = $upload;
			}else{
				$data_bagian['gambar'] = "default.jpg";
			}

			$result = $this->admin->bagian_tambah($data_bagian);
				if ($result > 0) {
					$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible show" role="alert">
							Data bagian berhasil ditambahkan.
							<a href="#" class="close text-white" data-dismiss="alert" aria-label="close">&times;</a>
						</button></div>');
					redirect("admin/bagian");
				} else {
					$data['error'] = 'Data bagian Gagal ditambahkan';
				}
		}	
	}

	public function editBagian($id)
	{
		$data['bagian'] = $this->admin->bagian_by_id($id);
		$data['title'] = 'Edit data Bagian';


		$this->load->view('admin/v_bagianEdit', $data);
	}

	public function bagian_proses_edit()
	{
		$rules = $this->admin->rulesBagian();
		$this->form_validation->set_rules($rules);
			
			
		$this->load->library('form_validation');
		if ($this->form_validation->run() == FALSE) {
			$data['title'] = 'Edit Data Surat Bagian';
			$data['error']= ' ';
			return $this->load->view('admin/editBagian/'.$this->input->post('id_bagian'), $data);
		}

		$tgl_lahir = date('Y-m-d', strtotime($this->input->post('tanggal_lahir_bagian')));
		$password = password_hash($this->input->post('password_bagian'), PASSWORD_DEFAULT);
		$id_bagian = $this->input->post('id_bagian');
		$data_edit =array('nama_bagian' => $this->input->post('nama_bagian'),
			'username_admin_bagian' => $this->input->post('username_admin_bagian'),
			'password_bagian' => $password,
			'nama_lengkap' => $this->input->post('nama_lengkap'),	
			'tanggal_lahir_bagian' => $tgl_lahir,
			'alamat' => $this->input->post('alamat'),
			'no_hp_bagian' => $this->input->post('no_hp_bagian')
		);


		if(!empty($_FILES['gambar']['name'])){
			$upload = $this->_do_upload();
			
			//delete file
			$bagian = $this->admin->bagian_by_id($this->input->post('nim'));
			if(file_exists('assets/backend/bagian/'.$bagian->gambar) && $bagian->gambar != 'default.jpg')
				unlink('assets/backend/bagian/'.$bagian->gambar);

			$data_edit['gambar'] = $upload;
		}else{
			$data_edit['gambar'] = $this->input->post('file_lama');
		}


		$result = $this->admin->bagian_edit($data_edit, $id_bagian);
		if ($result > 0) {
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible show" role="alert">
				Data bagian berhasil diubah.
				<a href="#" class="close text-white" data-dismiss="alert" aria-label="close">&times;</a>
				</button></div>');
			redirect("admin/bagian");
		} else {
			$data['error'] = 'Data bagian Gagal diubah';
		}

	}

	private function _do_upload()
	{
		$username = $this->input->post('username_admin_bagian');
		$nama_file_lengkap 		= $_FILES['gambar']['name'];
		$ext_file		= substr($nama_file_lengkap, strripos($nama_file_lengkap, '.'));
		$config['upload_path']          = 'assets/backend/bagian';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 2048; //set max size allowed in Kilobyte
        $config['max_width']            = 10000; // set max width image allowed
        $config['max_height']           = 10000; // set max height allowed
		$config['file_name']            =  $username. $ext_file; //just milisecond timestamp fot unique session_name()

        $this->load->library('upload', $config);

        if(!$this->upload->do_upload('gambar')) //upload and validate
        {
			$data['title'] = 'Tambah Data Surat Bagian';
			$data['error'] = $this->upload->display_errors();
			$this->load->view('admin/v_bagianTambah', $data);
		}
		return $this->upload->data('file_name');
	}

	public function hapusBagian($id)
	{
		$bagianlist = $this->admin->bagian_by_id($id);
		
		
		$data = array('id_bagian' => $bagianlist->id_bagian);
		
		if (file_exists('assets/backend/bagian/'.$bagianlist->gambar) && $bagianlist->gambar && $bagianlist->gambar!="default.jpg") {
			unlink('assets/backend/bagian/'.$bagianlist->gambar);
		}

		$hapusbagian = $this->admin->bagian_hapus($data['id_bagian']);
	
		if ($hapusbagian > 0) {

			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible show" role="alert">
					Data Bagian berhasil dihapus.
					<a href="#" class="close text-white" data-dismiss="alert" aria-label="close">&times;</a>
				</button></div>');
				redirect("admin/bagian");
			
		} else {
			$this->session->set_flashdata(
				'message',
				'<div class="alert alert-danger" role="alert">Data Gagal Diubah!</div>'
				);
		}
	}
	// tutup bagian
}