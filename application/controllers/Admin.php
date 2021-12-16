<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends Auth_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_admin', 'admin');
		if ($this->userdata['jenis'] != 'admin') {
			redirect('frontend/login');
		}
	}


	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['bagian'] = $this->admin->jumlah('tb_bagian');
		$data['surat_keluar'] = $this->admin->jumlah('tb_suratkeluar');
		$data['surat_masuk'] = $this->admin->jumlah('tb_suratmasuk');
		$data['surat_registrasi'] = $this->admin->jumlah('tb_suratregistrasi');



		$this->load->view('admin/index', $data);
	}

	// surat masuk
	public function surat_masuk()
	{
		$data['title'] = 'Data Surat Masuk';
		$data['surat_masuk'] = $this->admin->tampil_suratmasuk()->result();


		$this->load->view('admin/v_SM', $data);
	}

	public function surat_registrasi()
	{
		$data['title'] = 'Data Surat Registrasi';
		$data['surat_registrasi'] = $this->admin->tampil_suratregistrasi()->result();
		$this->load->view('admin/v_SR', $data);
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
			$nomorurut_suratmasuk = $this->input->post('nomorurut_suratmasuk');

			$tgl_masuk                  = date('Y-m-d H:i:s', strtotime($tanggalmasuk_suratmasuk));
			$tgl_surat                  = date('Y-m-d', strtotime($tanggalsurat_suratmasuk));
			$tgl_disp1                  = date('Y-m-d H:i:s', strtotime($tanggal_disposisi1));


			date_default_timezone_set('Asia/Jakarta');
			$thnNow = date("Y");
			if (!empty($_FILES['file_suratmasuk']['name'])) {
				$nama_file_lengkap 		= $_FILES['file_suratmasuk']['name'];
				$nama_file 		= substr($nama_file_lengkap, 0, strripos($nama_file_lengkap, '.'));
				$ext_file		= substr($nama_file_lengkap, strripos($nama_file_lengkap, '.'));
				$tipe_file 		= $_FILES['file_suratmasuk']['type'];
				$ukuran_file 	= $_FILES['file_suratmasuk']['size'];
				$tmp_file 		= $_FILES['file_suratmasuk']['tmp_name'];
				if ($ukuran_file > 10340000) {
					$data['error'] = 'file gambar terlalu besar';
				}
				$nama_baru = $thnNow . '-' . $nomorurut_suratmasuk . $ext_file;
			} else {
				$nama_baru = " ";
			}

			$path = $_SERVER['DOCUMENT_ROOT'] . '/Bondowoso_Bkd/assets/backend/surat_masuk/' . $nama_baru;
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
				'status' => "belumd"
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

			if (!empty($_FILES['file_suratmasuk']['name'])) {


				//delete file
				$SM = $this->admin->SM_by_id($this->input->post('id_suratmasuk'));
				if (file_exists('assets/backend/surat_masuk/' . $SM->file_suratmasuk) && $SM->file_suratmasuk) {
					unlink('assets/backend/surat_masuk/' . $SM->file_suratmasuk);
				}
				$nama_file_lengkap 		= $_FILES['file_suratmasuk']['name'];
				$nama_file 		= substr($nama_file_lengkap, 0, strripos($nama_file_lengkap, '.'));
				$ext_file		= substr($nama_file_lengkap, strripos($nama_file_lengkap, '.'));
				$tipe_file 		= $_FILES['file_suratmasuk']['type'];
				$ukuran_file 	= $_FILES['file_suratmasuk']['size'];
				$tmp_file 		= $_FILES['file_suratmasuk']['tmp_name'];
				if ($ukuran_file > 10340000) {
					$data['error'] = 'file gambar terlalu besar';
				}
				$nama_baru = $thnNow . '-' . $nomorurut_suratmasuk . $ext_file;
				$path = $_SERVER['DOCUMENT_ROOT'] . '/Bondowoso_Bkd/assets/backend/surat_masuk/' . $nama_baru;
				move_uploaded_file($tmp_file, $path);

				$SM_edit['file_suratmasuk'] = $nama_baru;
			} else {
				$SM_edit['file_suratmasuk'] = $this->input->post('file_lama');
			}
			$tanggalmasuk_suratmasuk = $this->input->post('tanggalmasuk_suratmasuk');
			$tanggalsurat_suratmasuk = $this->input->post('tanggalsurat_suratmasuk');
			$tanggal_disposisi1 = $this->input->post('tanggal_disposisi1');

			$tgl_masuk                  = date('Y-m-d H:i:s', strtotime($tanggalmasuk_suratmasuk));
			$tgl_surat                  = date('Y-m-d', strtotime($tanggalsurat_suratmasuk));
			$tgl_disp1                  = date('Y-m-d H:i:s', strtotime($tanggal_disposisi1));

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
				'tanggal_disposisi1' => $tgl_disp1
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


	public function status($id)
	{
		$data['ubah_status'] = $this->admin->SR_by_id($id);
		$data['title'] = 'Ubah Status Surat Registrasi';

		$this->load->view('admin/v_SRstatus', $data);
	}

	public function edit_prosesSRstatus()
	{
		$id_surat = $this->input->post('id_suratregistrasi');
		$status = $this->input->post('status');

		$UbahstatusSR = $this->admin->SR_statusProses($id_surat, $status);
		if ($UbahstatusSR > 0) {

			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible show" role="alert">
					Data Status Surat Registrasi Sudah Diubah .
					<a href="#" class="close text-white" data-dismiss="alert" aria-label="close">&times;</a>
				</button></div>');
			redirect("admin/surat_registrasi");
		} else {
			$this->session->set_flashdata(
				'message',
				'<div class="alert alert-danger" role="alert">Data Gagal Diubah!</div>'
			);
		}
	}

	public function hapusSR($id)
	{
		$SRlist = $this->admin->SR_by_id($id);
		var_dump($SRlist);

		$data = array(
			'id_suratregistrasi' => $SRlist->id_suratregistrasi
		);
		unlink('assets/backend/surat_registrasi/' . $SRlist->file_suratregistrasi);
		$hapusSR = $this->admin->SR_hapus($data['id_suratregistrasi']);





		if ($hapusSR > 0) {

			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible show" role="alert">
					Data Surat Registrasi berhasil dihapus.
					<a href="#" class="close text-white" data-dismiss="alert" aria-label="close">&times;</a>
				</button></div>');
			redirect("admin/surat_registrasi");
		} else {
			$this->session->set_flashdata(
				'message',
				'<div class="alert alert-danger" role="alert">Data Gagal Diubah!</div>'
			);
		}
	}

	public function detailSR($id)
	{
		$data['detail_SR'] = $this->admin->SR_by_id($id);
		$data['title'] = 'Detail data Surat Keluar';

		$this->load->view('admin/v_SRdetail', $data);
	}


	public function hapusSM($id)
	{
		$SMlist = $this->admin->SM_by_id($id);
		var_dump($SMlist);

		$data = array(
			'id_suratmasuk' => $SMlist->id_suratmasuk
		);
		unlink('assets/backend/surat_masuk/' . $SMlist->file_suratmasuk);
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


		if ($jumlah === 0) {
			$nomorbaru = "0001";
			return $nomorbaru;
			exit();
		} else {
			$nomor = $data1[0]->nomorurut_suratmasuk;
			$nomormax = substr($nomor, 0, 4);
			$nomorbaru = intval($nomormax) + 1;
			return $nomorbaru;
			exit();
		}
	}

	public function detailSM($id)
	{
		$data['detail_SM'] = $this->admin->SM_by_id($id);
		$data['title'] = 'Detail data Surat Masuk';

		$this->load->view('admin/v_SMdetail', $data);
	}

	public function unduhDisposisiSM($id)
	{
		include APPPATH . 'third_party/PHPExcel/Classes/PHPExcel.php';
		date_default_timezone_set("Asia/Jakarta");

		$excelku = new PHPExcel();

		// Set properties
		$excelku->getProperties()->setCreator("Gabut Koding")
			->setLastModifiedBy("Gabut Koding");
		//ambil data
		$dataDisSM = $this->admin->SM_by_id($id);

		$tgl_surat = $dataDisSM->tanggalsurat_suratmasuk;
		$tgl_surat = date('d/m/Y', strtotime($tgl_surat));
		$tgl_masuk = $dataDisSM->tanggalmasuk_suratmasuk;
		$tgl_masuk = date('d/m/Y', strtotime($tgl_masuk));

		$tahun = $dataDisSM->tanggalmasuk_suratmasuk;
		$tahun =  date('Y', strtotime($tahun));
		$nama_file = $tahun . '-' . $dataDisSM->nomorurut_suratmasuk . '-disposisi';
		$bulan = $dataDisSM->tanggalmasuk_suratmasuk;
		$bulan = date('m', strtotime($bulan));
		if ($bulan == '01') {
			$bulan = "JANUARI";
		} elseif ($bulan == '02') {
			$bulan = "FEBRUARI";
		} elseif ($bulan == '03') {
			$bulan = "MARET";
		} elseif ($bulan == '04') {
			$bulan = "APRIL";
		} elseif ($bulan == '05') {
			$bulan = "MEI";
		} elseif ($bulan == '06') {
			$bulan = "JUNI";
		} elseif ($bulan == '07') {
			$bulan = "JULI";
		} elseif ($bulan == '08') {
			$bulan = "AGUSTUS";
		} elseif ($bulan == '09') {
			$bulan = "SEPTEMBER";
		} elseif ($bulan == '10') {
			$bulan = "OKTOBER";
		} elseif ($bulan == '11') {
			$bulan = "NOVEMBER";
		} elseif ($bulan == '12') {
			$bulan = "DESEMBER";
		}


		//Mengeset Syle nya
		$headerStylenya = new PHPExcel_Style();
		$bodyStylenya   = new PHPExcel_Style();

		$headerStylenya->applyFromArray(
			array(
				'fill' 	=> array(
					'type'    => PHPExcel_Style_Fill::FILL_SOLID,
					'color'   => array('argb' => 'FFEEEEEE')
				),
				'borders' => array(
					'bottom' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
					'right'		=> array('style' => PHPExcel_Style_Border::BORDER_MEDIUM),
					'left'	    => array('style' => PHPExcel_Style_Border::BORDER_THIN),
					'top'	    => array('style' => PHPExcel_Style_Border::BORDER_THIN)
				)
			)
		);

		$bodyStylenya->applyFromArray(
			array(
				'fill' 	=> array(
					'type'	=> PHPExcel_Style_Fill::FILL_SOLID,
					'color'	=> array('argb' => 'FFFFFFFF')
				),
				'borders' => array(
					'bottom'	=> array('style' => PHPExcel_Style_Border::BORDER_THIN),
					'right'		=> array('style' => PHPExcel_Style_Border::BORDER_MEDIUM),
					'left'	    => array('style' => PHPExcel_Style_Border::BORDER_THIN),
					'top'	    => array('style' => PHPExcel_Style_Border::BORDER_THIN)
				)
			)
		);


		// Set page orientation and size
		$excelku->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_PORTRAIT);
		$excelku->getActiveSheet()->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_LEGAL);
		$excelku->getActiveSheet()->getPageMargins()->setTop(0.175);
		$excelku->getActiveSheet()->getPageMargins()->setRight(1.574);
		$excelku->getActiveSheet()->getPageMargins()->setLeft(0.787);
		$excelku->getActiveSheet()->getPageMargins()->setBottom(0.748);


		// Set lebar kolom

		$excelku->getActiveSheet()->getColumnDimension('A')->setWidth(4.5);
		$excelku->getActiveSheet()->getColumnDimension('B')->setWidth(3.2);
		$excelku->getActiveSheet()->getColumnDimension('C')->setWidth(4.35);
		$excelku->getActiveSheet()->getColumnDimension('D')->setWidth(3.2);
		$excelku->getActiveSheet()->getColumnDimension('E')->setWidth(3.2);
		$excelku->getActiveSheet()->getColumnDimension('F')->setWidth(3.2);
		$excelku->getActiveSheet()->getColumnDimension('G')->setWidth(3.2);
		$excelku->getActiveSheet()->getColumnDimension('H')->setWidth(3.2);
		$excelku->getActiveSheet()->getColumnDimension('I')->setWidth(3.2);
		$excelku->getActiveSheet()->getColumnDimension('J')->setWidth(1);
		$excelku->getActiveSheet()->getColumnDimension('K')->setWidth(3.2);
		$excelku->getActiveSheet()->getColumnDimension('L')->setWidth(3.2);
		$excelku->getActiveSheet()->getColumnDimension('M')->setWidth(3.2);
		$excelku->getActiveSheet()->getColumnDimension('N')->setWidth(3.2);
		$excelku->getActiveSheet()->getColumnDimension('O')->setWidth(1.8);
		$excelku->getActiveSheet()->getColumnDimension('P')->setWidth(3.2);
		$excelku->getActiveSheet()->getColumnDimension('Q')->setWidth(3.2);
		$excelku->getActiveSheet()->getColumnDimension('R')->setWidth(3.2);
		$excelku->getActiveSheet()->getColumnDimension('S')->setWidth(3.2);
		$excelku->getActiveSheet()->getColumnDimension('T')->setWidth(3.2);
		$excelku->getActiveSheet()->getColumnDimension('U')->setWidth(3.2);
		$excelku->getActiveSheet()->getColumnDimension('V')->setWidth(3.2);
		$excelku->getActiveSheet()->getColumnDimension('W')->setWidth(3.2);
		$excelku->getActiveSheet()->getColumnDimension('X')->setWidth(3.2);
		$excelku->getActiveSheet()->getColumnDimension('Y')->setWidth(3.2);
		// TINGGI BARIS
		$excelku->getActiveSheet()->getRowDimension(1)->setRowHeight(33);
		$excelku->getActiveSheet()->getRowDimension(2)->setRowHeight(30);
		$excelku->getActiveSheet()->getRowDimension(3)->setRowHeight(17.25);
		$excelku->getActiveSheet()->getRowDimension(4)->setRowHeight(17.25);
		$excelku->getActiveSheet()->getRowDimension(5)->setRowHeight(17.25);
		$excelku->getActiveSheet()->getRowDimension(6)->setRowHeight(17.25);
		$excelku->getActiveSheet()->getRowDimension(7)->setRowHeight(12);
		$excelku->getActiveSheet()->getRowDimension(8)->setRowHeight(17.25);
		$excelku->getActiveSheet()->getRowDimension(9)->setRowHeight(11.25);
		$excelku->getActiveSheet()->getRowDimension(10)->setRowHeight(15.75);
		$excelku->getActiveSheet()->getRowDimension(11)->setRowHeight(15.75);
		$excelku->getActiveSheet()->getRowDimension(12)->setRowHeight(14.25);
		$excelku->getActiveSheet()->getRowDimension(13)->setRowHeight(17.25);
		$excelku->getActiveSheet()->getStyle('D3:V6')->getAlignment()->setWrapText(true);



		// Mergecell, menyatukan beberapa kolom
		$excelku->getActiveSheet()->mergeCells('N1:R1');
		$excelku->getActiveSheet()->mergeCells('U1:X1');
		$excelku->getActiveSheet()->mergeCells('D3:V6');
		$excelku->getActiveSheet()->getStyle('D3:V6')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$excelku->getActiveSheet()->getStyle('D3:V6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$excelku->getActiveSheet()->mergeCells('B8:X8');
		$excelku->getActiveSheet()->mergeCells('D11:H11');
		$excelku->getActiveSheet()->mergeCells('K11:T11');
		$excelku->getActiveSheet()->mergeCells('B13:H13');
		$excelku->getActiveSheet()->mergeCells('M13:S13');
		$excelku->getActiveSheet()->mergeCells('S1:T1');
		$excelku->getActiveSheet()->getStyle('A1:Y13')->getFont()->setName('Calibri');
		$excelku->getActiveSheet()->getStyle('A1:Y13')->getFont()->setSize(13);
		$excelku->getActiveSheet()->getStyle('A1:Y13')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

		// Buat Kolom judul tabel
		$SI = $excelku->setActiveSheetIndex(0);
		$SI->setCellValue('N1', $dataDisSM->kode_suratmasuk);
		$SI->setCellValue('U1', $dataDisSM->nomorurut_suratmasuk);
		$SI->setCellValue('S1', $bulan);
		$SI->setCellValue('D3', $dataDisSM->perihal_suratmasuk);
		$SI->setCellValue('B8', $dataDisSM->pengirim);
		$SI->setCellValue('D11', $tgl_surat);
		$SI->setCellValue('B13', $dataDisSM->disposisi1);
		$SI->setCellValue('K11', $dataDisSM->nomor_suratmasuk);
		$SI->setCellValue('M13', $tgl_masuk);
		//Memberi nama sheet
		$excelku->getActiveSheet()->setTitle('DataDisposisi');

		$excelku->setActiveSheetIndex(0);

		// untuk excel 2007 atau yang berekstensi .xlsx
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="' . $nama_file . '".xlsx');
		header('Cache-Control: max-age=0');

		$objWriter = PHPExcel_IOFactory::createWriter($excelku, 'Excel2007');
		$objWriter->save('php://output');
		exit;
	}

	public function downloadlap_SM()
	{
		include APPPATH . 'third_party/PHPExcel/Classes/PHPExcel.php';
		date_default_timezone_set("Asia/Jakarta");

		$excelku = new PHPExcel();

		// Set properties
		$excelku->getProperties()->setCreator("Gabut Koding")
			->setLastModifiedBy("Gabut Koding");
		//ambil data
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');
		$dataSM = $this->admin->download_lapSM($bulan, $tahun)->result();
		if ($bulan == '01') {
			$bulan = "JANUARI";
		} elseif ($bulan == '02') {
			$bulan = "FEBRUARI";
		} elseif ($bulan == '03') {
			$bulan = "MARET";
		} elseif ($bulan == '04') {
			$bulan = "APRIL";
		} elseif ($bulan == '05') {
			$bulan = "MEI";
		} elseif ($bulan == '06') {
			$bulan = "JUNI";
		} elseif ($bulan == '07') {
			$bulan = "JULI";
		} elseif ($bulan == '08') {
			$bulan = "AGUSTUS";
		} elseif ($bulan == '09') {
			$bulan = "SEPTEMBER";
		} elseif ($bulan == '10') {
			$bulan = "OKTOBER";
		} elseif ($bulan == '11') {
			$bulan = "NOVEMBER";
		} elseif ($bulan == '12') {
			$bulan = "DESEMBER";
		}
		if ($dataSM == null) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible show" role="alert">
			  Tidak ada Surat Masuk pada bulan <b>' . $bulan . '</b> di tahun <b>' . $tahun . '</b> 
			  <a href="#" class="close text-white" data-dismiss="alert" aria-label="close">&times;</a>
			 </button></div>');
			redirect("admin/surat_masuk");
			exit();
		}
		$nama_file = 'Surat Masuk-' . $bulan . '-' . $tahun;
		// Mergecell, menyatukan beberapa kolom
		$excelku->getActiveSheet()->mergeCells('A2:H2');
		$excelku->getActiveSheet()->setCellValue('A2', "PEMERINTAH KOTA BONDOWOSO");
		$excelku->getActiveSheet()->mergeCells('A3:H3');
		$excelku->getActiveSheet()->setCellValue('A3', "BADAN KEPEGAWAIAN DAERAH KOTA BONDOWOSO");
		$excelku->getActiveSheet()->mergeCells('A4:H4');
		$excelku->getActiveSheet()->setCellValue('A4', "BAGIAN TATA USAHA");
		$excelku->getActiveSheet()->mergeCells('A5:H5');
		$excelku->getActiveSheet()->setCellValue('A5', "Jl. KH Ashari No.123 Kademangan, Kec. Bondowoso, Kabupaten Bondowoso, Jawa Timur 68217");
		$excelku->getActiveSheet()->mergeCells('A6:H6');
		$excelku->getActiveSheet()->setCellValue('A6', "DATA SURAT MASUK BULAN $bulan TAHUN $tahun");
		$excelku->getActiveSheet()->getStyle('A2:H6')->getFont()->setName('Arial');
		$excelku->getActiveSheet()->getStyle('A2:H6')->getFont()->setSize(14);
		$excelku->getActiveSheet()->getStyle('A2:H6')->getFont()->setBold(true);
		$excelku->getActiveSheet()->getStyle('A2:H6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$excelku->getActiveSheet()->mergeCells('A8:A9');
		$excelku->getActiveSheet()->setCellValue('A8', "NO");
		$excelku->getActiveSheet()->mergeCells('B8:B9');
		$excelku->getActiveSheet()->setCellValue('B8', "NO URUT");
		$excelku->getActiveSheet()->mergeCells('C8:F8');
		$excelku->getActiveSheet()->setCellValue('C8', "SURAT MASUK");
		$excelku->getActiveSheet()->getStyle('C8:F8')->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$excelku->getActiveSheet()->mergeCells('G8:G9');
		$excelku->getActiveSheet()->setCellValue('G8', "TANGGAL MASUK");
		$excelku->getActiveSheet()->mergeCells('H8:H9');
		$excelku->getActiveSheet()->setCellValue('H8', "KODE SURAT");
		$excelku->getActiveSheet()->mergeCells('I8:N8');
		$excelku->getActiveSheet()->setCellValue('I8', "DISPOSISI");
		$excelku->getActiveSheet()->getStyle('A8:N9')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$excelku->getActiveSheet()->getStyle('A8:N9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$excelku->getActiveSheet()->getStyle('A8:N9')->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);

		// Buat Kolom judul tabel
		$SI = $excelku->setActiveSheetIndex(0);
		$SI->setCellValue('C9', "ALAMAT PENGIRIM");
		$SI->setCellValue('D9', "NOMOR SURAT");
		$SI->setCellValue('E9', "TANGGAL SURAT");
		$SI->setCellValue('F9', "PERIHAL");
		$SI->setCellValue('I9', "I");
		$SI->setCellValue('J9', "TGL I");
		$SI->setCellValue('K9', "II");
		$SI->setCellValue('L9', "TGL II");
		$SI->setCellValue('M9', "III");
		$SI->setCellValue('N9', "TGL III");


		//Mengeset Syle nya
		$headerStylenya = new PHPExcel_Style();
		$bodyStylenya   = new PHPExcel_Style();

		$headerStylenya->applyFromArray(
			array(
				'fill' 	=> array(
					'type'    => PHPExcel_Style_Fill::FILL_SOLID,
					'color'   => array('argb' => 'FFEEEEEE')
				),
				'borders' => array(
					'bottom' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
					'right'		=> array('style' => PHPExcel_Style_Border::BORDER_MEDIUM),
					'left'	    => array('style' => PHPExcel_Style_Border::BORDER_THIN),
					'top'	    => array('style' => PHPExcel_Style_Border::BORDER_THIN)
				)
			)
		);

		$bodyStylenya->applyFromArray(
			array(
				'fill' 	=> array(
					'type'	=> PHPExcel_Style_Fill::FILL_SOLID,
					'color'	=> array('argb' => 'FFFFFFFF')
				),
				'borders' => array(
					'bottom'	=> array('style' => PHPExcel_Style_Border::BORDER_THIN),
					'right'		=> array('style' => PHPExcel_Style_Border::BORDER_MEDIUM),
					'left'	    => array('style' => PHPExcel_Style_Border::BORDER_THIN),
					'top'	    => array('style' => PHPExcel_Style_Border::BORDER_THIN)
				)
			)
		);

		$excelku->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
		$excelku->getActiveSheet()->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_LEGAL);
		$excelku->getActiveSheet()->getPageMargins()->setTop(0.75);
		$excelku->getActiveSheet()->getPageMargins()->setRight(0.7);
		$excelku->getActiveSheet()->getPageMargins()->setLeft(0.7);
		$excelku->getActiveSheet()->getPageMargins()->setBottom(0.75);
		$excelku->getActiveSheet()->getPageSetup()->setFitToWidth(1);
		$excelku->getActiveSheet()->getPageSetup()->setFitToHeight(0);


		$baris  = 10; //Ini untuk dimulai baris datanya, karena di baris 3 itu digunakan untuk header tabel
		$no     = 1;

		foreach ($dataSM as $SM) {

			$SI->setCellValue("A" . $baris, $no++); //mengisi data untuk nomor urut
			$SI->setCellValue("B" . $baris, $SM->nomorurut_suratmasuk);
			$SI->setCellValue("C" . $baris, $SM->pengirim);
			$SI->setCellValue("D" . $baris, $SM->nomor_suratmasuk);
			$SI->setCellValue("E" . $baris, $SM->tanggalsurat_suratmasuk);
			$SI->setCellValue("F" . $baris, $SM->perihal_suratmasuk);
			$SI->setCellValue("G" . $baris, $SM->tanggalmasuk_suratmasuk);
			$SI->setCellValue("H" . $baris, $SM->kode_suratmasuk);
			$SI->setCellValue("I" . $baris, $SM->disposisi1);
			$SI->setCellValue("J" . $baris, $SM->tanggal_disposisi1);
			$baris++; //looping untuk barisnya

			// Set lebar kolom

			$excelku->getActiveSheet()->getColumnDimension('A')->setWidth(8.14);
			$excelku->getActiveSheet()->getColumnDimension('B')->setWidth(13);
			$excelku->getActiveSheet()->getColumnDimension('C')->setWidth(29);
			$excelku->getActiveSheet()->getColumnDimension('D')->setWidth(30);
			$excelku->getActiveSheet()->getColumnDimension('E')->setWidth(16);
			$excelku->getActiveSheet()->getColumnDimension('F')->setWidth(39);
			$excelku->getActiveSheet()->getColumnDimension('G')->setWidth(28);
			$excelku->getActiveSheet()->getColumnDimension('H')->setWidth(18);
			$excelku->getActiveSheet()->getColumnDimension('I')->setWidth(21);
			$excelku->getActiveSheet()->getColumnDimension('J')->setWidth(21);
			$excelku->getActiveSheet()->getColumnDimension('K')->setWidth(21);
			$excelku->getActiveSheet()->getColumnDimension('L')->setWidth(21);
			$excelku->getActiveSheet()->getColumnDimension('M')->setWidth(21);
			$excelku->getActiveSheet()->getColumnDimension('N')->setWidth(21);
			$excelku->getActiveSheet()->getStyle('A10:N' . $baris . '')->getFont()->setName('Calibri');
			$excelku->getActiveSheet()->getStyle('A10:N' . $baris . '')->getFont()->setSize(11);
			$excelku->getActiveSheet()->getRowDimension($baris)->setRowHeight(-1);
			$excelku->getActiveSheet()->getStyle('C10:C' . $baris . '')->getAlignment()->setWrapText(true); // wraptext
			$excelku->getActiveSheet()->getStyle('F10:F' . $baris . '')->getAlignment()->setWrapText(true);
			$excelku->getActiveSheet()->getStyle('A10:B' . $baris . '')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$excelku->getActiveSheet()->getStyle('D10:E' . $baris . '')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$excelku->getActiveSheet()->getStyle('G10:N' . $baris . '')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$excelku->getActiveSheet()->getStyle('A10:N' . $baris . '')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			$excelku->getActiveSheet()->getStyle('A10:N' . $baris . '')->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		}

		//Memberi nama sheet
		$excelku->getActiveSheet()->setTitle('DataSuratKeluar');

		$excelku->setActiveSheetIndex(0);

		// untuk excel 2007 atau yang berekstensi .xlsx
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="' . $nama_file . '".xlsx');
		header('Cache-Control: max-age=0');

		$objWriter = PHPExcel_IOFactory::createWriter($excelku, 'Excel2007');
		$objWriter->save('php://output');
		exit;
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
			$ambilnomor                 = substr("$nomor_suratkeluar", 0, 4);

			$tgl_keluar                  = date('Y-m-d H:i:s', strtotime($tanggalkeluar_suratkeluar));
			$tgl_surat                  = date('Y-m-d', strtotime($tanggalsurat_suratkeluar));

			date_default_timezone_set('Asia/Jakarta');
			$thnNow = date("Y");

			if (!empty($_FILES['file_suratkeluar']['name'])) {
				$nama_file_lengkap 		= $_FILES['file_suratkeluar']['name'];
				$nama_file 		= substr($nama_file_lengkap, 0, strripos($nama_file_lengkap, '.'));
				$ext_file		= substr($nama_file_lengkap, strripos($nama_file_lengkap, '.'));
				$tipe_file 		= $_FILES['file_suratkeluar']['type'];
				$ukuran_file 	= $_FILES['file_suratkeluar']['size'];
				$tmp_file 		= $_FILES['file_suratkeluar']['tmp_name'];
				if ($ukuran_file > 10340000) {
					$data['error'] = 'file dokumen terlalu besar';
				}
				$namaSK_baru = $thnNow . '-' . $nomor_suratkeluar . $ext_file;
			} else {
				$namaSK_baru = " ";
			}
			$path = $_SERVER['DOCUMENT_ROOT'] . '/Bondowoso_Bkd/assets/backend/surat_keluar/' . $namaSK_baru;
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


		if ($jumlah === 0) {
			$nomorbaru = "0001";
			return $nomorbaru;
			exit();
		} else {
			$nomor = $data1[0]->nomor_suratkeluar;
			$nomormax = substr($nomor, 0, 4);
			$nomorbaru = intval($nomormax) + 1;
			return $nomorbaru;
			exit();
		}
	}


	public function editSK($id)
	{
		$data['surat_keluar'] = $this->admin->SK_by_id($id);
		$data['title'] = 'Edit data Surat Keluar';

		// $disposisi = $this->admin->disposisi()->result();
		$data['disposisi'] = $this->admin->disposisi()->result();

		$this->load->view('admin/v_SKedit', $data);
	}

	public function edit_prosesSK()
	{
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

			if (!empty($_FILES['file_suratkeluar']['name'])) {


				//delete file
				$SK = $this->admin->SK_by_id($this->input->post('id_suratkeluar'));

				if (file_exists('assets/backend/surat_keluar/' . $SK->file_suratkeluar) && $SK->file_suratkeluar) {
					unlink('assets/backend/surat_keluar/' . $SK->file_suratkeluar);
				}

				$nomor_suratkeluar = $this->input->post('nomor_suratkeluar');

				$thnNow = date("Y");
				$ambilnomor                 = substr("$nomor_suratkeluar", 0, 4);

				$nama_file_lengkapSK 		= $_FILES['file_suratkeluar']['name'];
				$nama_fileSK 		= substr($nama_file_lengkapSK, 0, strripos($nama_file_lengkapSK, '.'));
				$ext_fileSK		= substr($nama_file_lengkapSK, strripos($nama_file_lengkapSK, '.'));
				$tipe_fileSK 		= $_FILES['file_suratkeluar']['type'];
				$ukuran_fileSK 	= $_FILES['file_suratkeluar']['size'];
				$tmp_fileSK 		= $_FILES['file_suratkeluar']['tmp_name'];
				if ($ukuran_fileSK > 10340000) {
					$data['error'] = 'file dokeumen terlalu besar';
				}
				$nama = $thnNow . '-' . $ambilnomor . $ext_fileSK;
				$pathSK = $_SERVER['DOCUMENT_ROOT'] . '/Bondowoso_Bkd/assets/backend/surat_keluar/' . $nama;
				move_uploaded_file($tmp_fileSK, $pathSK);

				$SK_edit['file_suratkeluar'] = $nama;
			} else {
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

			$result = $this->admin->SK_edit($SK_edit, $id_surat);
			if ($result > 0) {
				$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible show" role="alert">
							Data Surat Keluar berhasil diubah.
							<a href="#" class="close text-white" data-dismiss="alert" aria-label="close">&times;</a>
						</button></div>' . $pathSK);
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

		$data = array(
			'id_suratkeluar' => $SKlist->id_suratkeluar
		);
		unlink('assets/backend/surat_keluar/' . $SKlist->file_suratkeluar);
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

	public function detailSK($id)
	{
		$data['detail_SK'] = $this->admin->SK_by_id($id);
		$data['title'] = 'Detail data Surat Keluar';

		$this->load->view('admin/v_SKdetail', $data);
	}

	public function downloadlap_SK()
	{
		include APPPATH . 'third_party/PHPExcel/Classes/PHPExcel.php';
		date_default_timezone_set("Asia/Jakarta");

		$excelku = new PHPExcel();

		// Set properties
		$excelku->getProperties()->setCreator("Gabut Koding")
			->setLastModifiedBy("Gabut Koding");
		//ambil data
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');
		$dataSK = $this->admin->download_lapSK($bulan, $tahun)->result();
		if ($bulan == '01') {
			$bulan = "JANUARI";
		} elseif ($bulan == '02') {
			$bulan = "FEBRUARI";
		} elseif ($bulan == '03') {
			$bulan = "MARET";
		} elseif ($bulan == '04') {
			$bulan = "APRIL";
		} elseif ($bulan == '05') {
			$bulan = "MEI";
		} elseif ($bulan == '06') {
			$bulan = "JUNI";
		} elseif ($bulan == '07') {
			$bulan = "JULI";
		} elseif ($bulan == '08') {
			$bulan = "AGUSTUS";
		} elseif ($bulan == '09') {
			$bulan = "SEPTEMBER";
		} elseif ($bulan == '10') {
			$bulan = "OKTOBER";
		} elseif ($bulan == '11') {
			$bulan = "NOVEMBER";
		} elseif ($bulan == '12') {
			$bulan = "DESEMBER";
		}
		$nama_file = 'Surat Keluar-' . $bulan . '-' . $tahun;
		// Mergecell, menyatukan beberapa kolom
		$excelku->getActiveSheet()->mergeCells('A2:H2');
		$excelku->getActiveSheet()->setCellValue('A2', "PEMERINTAH KOTA BONDOWOSO");
		$excelku->getActiveSheet()->mergeCells('A3:H3');
		$excelku->getActiveSheet()->setCellValue('A3', "BADAN KEPEGAWAIAN DAERAH KOTA BONDOWOSO");
		$excelku->getActiveSheet()->mergeCells('A4:H4');
		$excelku->getActiveSheet()->setCellValue('A4', "BAGIAN TATA USAHA");
		$excelku->getActiveSheet()->mergeCells('A5:H5');
		$excelku->getActiveSheet()->setCellValue('A5', "Jl. KH Ashari No.123 Kademangan, Kec. Bondowoso, Kabupaten Bondowoso, Jawa Timur 68217");
		$excelku->getActiveSheet()->mergeCells('A6:H6');
		$excelku->getActiveSheet()->setCellValue('A6', "DATA SURAT KELUAR BULAN $bulan TAHUN $tahun");
		$excelku->getActiveSheet()->getStyle('A2:H6')->getFont()->setName('Arial');
		$excelku->getActiveSheet()->getStyle('A2:H6')->getFont()->setSize(14);
		$excelku->getActiveSheet()->getStyle('A2:H6')->getFont()->setBold(true);
		$excelku->getActiveSheet()->getStyle('A2:H6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$excelku->getActiveSheet()->getStyle('A8:H8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$excelku->getActiveSheet()->getStyle('A8:H8')->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);


		// Buat Kolom judul tabel
		$SI = $excelku->setActiveSheetIndex(0);
		$SI->setCellValue('A8', "No");
		$SI->setCellValue('B8', "NOMOR SURAT");
		$SI->setCellValue('C8', "TANGGAL KELUAR");
		$SI->setCellValue('D8', "KODE SURAT");
		$SI->setCellValue('E8', "NAMA BAGIAN");
		$SI->setCellValue('F8', "TANGGAL SURAT");
		$SI->setCellValue('G8', "KEPADA");
		$SI->setCellValue('H8', "PERIHAL");

		//Mengeset Syle nya
		$headerStylenya = new PHPExcel_Style();
		$bodyStylenya   = new PHPExcel_Style();

		$headerStylenya->applyFromArray(
			array(
				'fill' 	=> array(
					'type'    => PHPExcel_Style_Fill::FILL_SOLID,
					'color'   => array('argb' => 'FFEEEEEE')
				),
				'borders' => array(
					'bottom' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
					'right'		=> array('style' => PHPExcel_Style_Border::BORDER_MEDIUM),
					'left'	    => array('style' => PHPExcel_Style_Border::BORDER_THIN),
					'top'	    => array('style' => PHPExcel_Style_Border::BORDER_THIN)
				)
			)
		);

		$bodyStylenya->applyFromArray(
			array(
				'fill' 	=> array(
					'type'	=> PHPExcel_Style_Fill::FILL_SOLID,
					'color'	=> array('argb' => 'FFFFFFFF')
				),
				'borders' => array(
					'bottom'	=> array('style' => PHPExcel_Style_Border::BORDER_THIN),
					'right'		=> array('style' => PHPExcel_Style_Border::BORDER_MEDIUM),
					'left'	    => array('style' => PHPExcel_Style_Border::BORDER_THIN),
					'top'	    => array('style' => PHPExcel_Style_Border::BORDER_THIN)
				)
			)
		);
		// Set page orientation and size
		$excelku->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
		$excelku->getActiveSheet()->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_LEGAL);
		$excelku->getActiveSheet()->getPageMargins()->setTop(0.75);
		$excelku->getActiveSheet()->getPageMargins()->setRight(0.7);
		$excelku->getActiveSheet()->getPageMargins()->setLeft(0.7);
		$excelku->getActiveSheet()->getPageMargins()->setBottom(0.75);


		$baris  = 9; //Ini untuk dimulai baris datanya, karena di baris 3 itu digunakan untuk header tabel
		$no     = 1;

		foreach ($dataSK as $SK) {
			$SI->setCellValue("A" . $baris, $no++); //mengisi data untuk nomor urut
			$SI->setCellValue("B" . $baris, $SK->nomor_suratkeluar);
			$SI->setCellValue("C" . $baris, $SK->tanggalkeluar_suratkeluar);
			$SI->setCellValue("D" . $baris, $SK->kode_suratkeluar);
			$SI->setCellValue("E" . $baris, $SK->nama_bagian);
			$SI->setCellValue("F" . $baris, $SK->tanggalsurat_suratkeluar);
			$SI->setCellValue("G" . $baris, $SK->kepada_suratkeluar);
			$SI->setCellValue("H" . $baris, $SK->perihal_suratkeluar);
			$baris++; //looping untuk barisnya

			// Set lebar kolom

			$excelku->getActiveSheet()->getColumnDimension('A')->setWidth(8.14);
			$excelku->getActiveSheet()->getColumnDimension('B')->setWidth(29);
			$excelku->getActiveSheet()->getColumnDimension('C')->setWidth(21);
			$excelku->getActiveSheet()->getColumnDimension('D')->setWidth(16);
			$excelku->getActiveSheet()->getColumnDimension('E')->setWidth(18);
			$excelku->getActiveSheet()->getColumnDimension('F')->setWidth(21);
			$excelku->getActiveSheet()->getColumnDimension('G')->setWidth(35);
			$excelku->getActiveSheet()->getColumnDimension('H')->setWidth(40);
			$excelku->getActiveSheet()->getRowDimension($baris)->setRowHeight(-1);
			$excelku->getActiveSheet()->getStyle('A9:F' . $baris . '')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$excelku->getActiveSheet()->getStyle('A9:H' . $baris . '')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			$excelku->getActiveSheet()->getStyle('A9:H' . $baris . '')->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
			$excelku->getActiveSheet()->getStyle('G9:H' . $baris . '')->getAlignment()->setWrapText(true);
			//wraptext
		}

		//Memberi nama sheet
		$excelku->getActiveSheet()->setTitle('DataSuratKeluar');

		$excelku->setActiveSheetIndex(0);

		// untuk excel 2007 atau yang berekstensi .xlsx
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="' . $nama_file . '".xlsx');
		header('Cache-Control: max-age=0');

		$objWriter = PHPExcel_IOFactory::createWriter($excelku, 'Excel2007');
		$objWriter->save('php://output');
		exit;
	}

	//tutup surat keluar

	// data Bagian
	public function bagian()
	{
		$data['title'] = 'Data Bagian';
		$data['data_bagian'] = $this->admin->tampil_bagian()->result();

		$this->load->view('admin/v_bagian', $data);
	}

	public function bagian_tambah()
	{
		$data['title'] = 'Tambah Data Bagian';
		$data['error'] = ' ';


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
				$data['error'] = ' ';
				return $this->load->view('admin/v_bagianTambah', $data);
			}

			$tgl_lahir                  = date('Y-m-d', strtotime($this->input->post('tanggal_lahir_bagian')));
			$password = password_hash($this->input->post('password_bagian'), PASSWORD_DEFAULT);
			$data_bagian = array(
				'nama_bagian' => $this->input->post('nama_bagian'),
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
			} else {
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
			$data['error'] = ' ';
			return $this->load->view('admin/editBagian/' . $this->input->post('id_bagian'), $data);
		}

		$tgl_lahir = date('Y-m-d', strtotime($this->input->post('tanggal_lahir_bagian')));
		$password = password_hash($this->input->post('password_bagian'), PASSWORD_DEFAULT);
		$id_bagian = $this->input->post('id_bagian');
		$data_edit = array(
			'nama_bagian' => $this->input->post('nama_bagian'),
			'username_admin_bagian' => $this->input->post('username_admin_bagian'),
			'password_bagian' => $password,
			'nama_lengkap' => $this->input->post('nama_lengkap'),
			'tanggal_lahir_bagian' => $tgl_lahir,
			'alamat' => $this->input->post('alamat'),
			'no_hp_bagian' => $this->input->post('no_hp_bagian')
		);


		if (!empty($_FILES['gambar']['name'])) {
			$upload = $this->_do_upload();

			//delete file
			$bagian = $this->admin->bagian_by_id($this->input->post('nim'));
			if (file_exists('assets/backend/images/bagian/' . $bagian->gambar) && $bagian->gambar != 'default.jpg')
				unlink('assets/backend/images/bagian/' . $bagian->gambar);

			$data_edit['gambar'] = $upload;
		} else {
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
		$config['upload_path']          = 'assets/backend/images/bagian';
<<<<<<< HEAD
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 2048; //set max size allowed in Kilobyte
		$config['max_width']            = 10000; // set max width image allowed
		$config['max_height']           = 10000; // set max height allowed
		$config['file_name']            =  $username . $ext_file; //just milisecond timestamp fot unique session_name()
=======
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 2048; //set max size allowed in Kilobyte
        $config['max_width']            = 10000; // set max width image allowed
        $config['max_height']           = 10000; // set max height allowed
		$config['file_name']            =  $username. $ext_file; //just milisecond timestamp fot unique session_name()
>>>>>>> e249d5b0ac1bd8d9e7efe332cb407f398dd6ff7e

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('gambar')) //upload and validate
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

		if (file_exists('assets/backend/images/bagian/' . $bagianlist->gambar) && $bagianlist->gambar && $bagianlist->gambar != "default.jpg") {
			unlink('assets/backend/images/bagian/' . $bagianlist->gambar);
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

	public function detailBagian($id)
	{
		$data['detail_bagian'] = $this->admin->bagian_by_id($id);
		$data['title'] = 'Detail data Bagian';

		$this->load->view('admin/v_bagiandetail', $data);
	}
	// tutup bagian

	//profile
	public function profil()
	{
		$data['title'] = 'Data Profile';

		$data['profil'] = $this->admin->tampil_profil();

		$this->load->view('admin/profile', $data);
	}

	public function editprofil()
	{
		$data['title'] = 'Edit Data';

		$data['profil'] = $this->admin->tampil_profil();

		$this->load->view('admin/editprofile', $data);
	}

	public function proses_editprofile()
	{
		$id_admin = $this->input->post('id_admin');
		$password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
		$data_edit = array(
			'nama_admin' => $this->input->post('nama_admin'),
			'username_admin' => $this->input->post('username_admin'),
			'password' => $password
		);


		if (!empty($_FILES['gambar']['name'])) {
			$upload = $this->_do_uploadmin();

			//delete file
			$datamin = $this->admin->admin_by_id($this->input->post('id_admin'));
			if (file_exists('assets/backend/images/admin/' . $datamin->gambar) && $datamin->gambar != 'default.jpg')
				unlink('assets/backend/images/admin/' . $datamin->gambar);

			$data_edit['gambar'] = $upload;
			$d = $upload;
		} else {
			$data_edit['gambar'] = $this->input->post('file_lama');
			$d = $this->input->post('file_lama');
		}

		$_SESSION['gambar'] = $d;
		$result = $this->admin->profile_edit($data_edit, $id_admin);
		if ($result > 0) {

			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible show" role="alert">
				Data profil berhasil diubah.
				<a href="#" class="close text-white" data-dismiss="alert" aria-label="close">&times;</a>
				</button></div>');
			redirect("admin/profil");
		} else {
			$data['error'] = 'Data profil Gagal diubah';
		}
	}

	private function _do_uploadmin()
	{
		$username = $this->input->post('username_admin');
		$nama_file_lengkap 		= $_FILES['gambar']['name'];
		$ext_file		= substr($nama_file_lengkap, strripos($nama_file_lengkap, '.'));
		$config['upload_path']          = 'assets/backend/images/admin';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 2048; //set max size allowed in Kilobyte
		$config['max_width']            = 10000; // set max width image allowed
		$config['max_height']           = 10000; // set max height allowed
		$config['file_name']            =  $username . $ext_file; //just milisecond timestamp fot unique session_name()

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('gambar')) //upload and validate
		{
			$data['title'] = 'edit Data Surat profile';
			$data['error'] = $this->upload->display_errors();
			$this->load->view('admin/profile', $data);
		}
		return $this->upload->data('file_name');
	}


	//tutup profile
}
