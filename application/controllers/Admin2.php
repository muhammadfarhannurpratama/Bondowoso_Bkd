<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin2 extends Auth_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_admin2', 'admin2');
        if ($this->userdata['jenis'] != 'admin2') {
            redirect('frontend/login');
        }
    }


    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['surat_registrasi'] = $this->admin2->jumlah('tb_suratregistrasi');

        $this->load->view('admin2/index', $data);
    }

    // surat masuk
    public function surat_registrasi()
	{	
		$data['title'] = 'Data Surat Registrasi';
		$data['surat_registrasi'] = $this->admin2->tampil_suratregistrasi()->result();	
		$this->load->view('admin2/v_SR', $data);
	}

	public function tambahSR()
	{
		$data['title'] = 'Tambah Data Surat Registrasi';
		$data['nomor_suratregistrasi'] = $this->_ambil_nomorSR();

		$this->load->view('admin2/v_SRtambah', $data);
	
	}

	public function tambah_prosesSR()
	{		
		if ($this->input->method() === 'post') {
		
			$rules = $this->admin2->rulesSR();
			$this->form_validation->set_rules($rules);
			
			
			$this->load->library('form_validation');
			if ($this->form_validation->run() == FALSE) {
				$data['title'] = 'Tambah Data Surat Registrasi';
				$data['nomor_suratregistrasi'] = $this->_ambil_nomorSR();

				return $this->load->view('admin2/v_SRtambah', $data);
			}
		
			$tanggalmasuk_suratregistrasi = $this->input->post('tanggalmasuk_suratregistrasi');
			$tanggalsurat_suratregistrasi = $this->input->post('tanggalsurat_suratregistrasi');
			$nomor_suratregistrasi = $this->input->post('nomor_suratregistrasi');
            $ambilnomor                 = substr("$nomor_suratregistrasi",0,4);

			$tgl_masuk                  = date('Y-m-d H:i:s', strtotime($tanggalmasuk_suratregistrasi));
            $tgl_surat                  = date('Y-m-d', strtotime($tanggalsurat_suratregistrasi));

			date_default_timezone_set('Asia/Jakarta'); 
					$thnNow = date("Y");

			if(!empty($_FILES['file_suratregistrasi']['name'])){		
			$nama_file_lengkap 		= $_FILES['file_suratregistrasi']['name'];
			$nama_file 		= substr($nama_file_lengkap, 0, strripos($nama_file_lengkap, '.'));
			$ext_file		= substr($nama_file_lengkap, strripos($nama_file_lengkap, '.'));
			$tipe_file 		= $_FILES['file_suratregistrasi']['type'];
			$ukuran_file 	= $_FILES['file_suratregistrasi']['size'];
			$tmp_file 		= $_FILES['file_suratregistrasi']['tmp_name'];
			if($ukuran_file > 10340000){
				$data['error'] = 'file dokumen terlalu besar';
			}
			$namaSR_baru = $thnNow.'-'.$nomo_suratregistrasi . $ext_file;
			}else{
				$namaSR_baru = " ";
		}
			
			$path = $_SERVER['DOCUMENT_ROOT'].'/Bondowoso_Bkd/assets/backend/surat_registrasi/'.$namaSR_baru;
			move_uploaded_file($tmp_file, $path);

					$tanggal_entry  = date("Y-m-d H:i:s");
					
					$SR_baru = [
						'tanggalmasuk_suratregistrasi' => $tgl_masuk,
						'kode_suratregistrasi' => $this->input->post('kode_suratregistrasi'),
						'nomor_suratregistrasi' => $this->input->post('nomor_suratregistrasi'),
						'nama_bagian' => $this->input->post('nama_bagian'),
						'tanggalsurat_suratregistrasi' => $tgl_surat,
						'kepada_suratregistrasi' => $this->input->post('kepada_suratregistrasi'),
						'perihal_suratregistrasi' => $this->input->post('perihal_suratregistrasi'),
						'operatorregistrasi' => $this->input->post('operatorregistrasi'),
						'file_suratregistrasi' => $namaSR_baru,
						'tanggal_entry' => $tanggal_entry,
						'status' => "belumd"
					];

					$result = $this->admin2->SR_tambah($SR_baru);
					if ($result > 0) {
						$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible show" role="alert">
							Data Surat Registrasi berhasil ditambahkan.
							<a href="#" class="close text-white" data-dismiss="alert" aria-label="close">&times;</a>
						</button></div>');
						redirect("admin2/surat_registrasi");
					} else {
						$data['error'] = 'Data Surat Keluar Gagal ditambahkan';
					}
			}
		
	}


	private function _ambil_nomorSR() 
	{
		$data1 = $this->admin2->nomorSR()->result();
		$jumlah = $this->admin2->nomorSR()->num_rows();
		$nomor = $data1[0]->nomor_suratregistrasi;

		if ($jumlah =0){
			$nomorbaru = "0001";
		} else {
			$nomormax = substr($nomor,0,4);
			$nomorbaru = intval($nomormax)+1;
		}

		
		return $nomorbaru;
	}

	public function editSR($id)
	{
		$data['surat_registrasi'] = $this->admin2->SR_by_id($id);
		$data['title'] = 'Edit data Surat Registrasi';

		$this->load->view('admin2/v_SRedit', $data);
	}

	public function edit_prosesSR() {
		if ($this->input->method() === 'post') {
		
			$rules = $this->admin2->rulesSR();
			$this->form_validation->set_rules($rules);
			
			
			// $this->load->library('form_validation');
			// if ($this->form_validation->run() == FALSE) {
			// 	$data['title'] = 'Tambah Data Surat Keluar';
			// 	$disposisi = $this->admin2->disposisi()->result();
			// 	$data['disposisi'] = $disposisi;
			// 	$data['nomor_suratkeluar'] = $this->_ambil_nomorSR();

			// 	return $this->load->view('admin2/v_SRtambah', $data);
			// }
			date_default_timezone_set('Asia/Jakarta'); 
					
			if(!empty($_FILES['file_suratregistrasi']['name'])){		
				

				//delete file
				$SR = $this->admin2->SR_by_id($this->input->post('id_suratregistrasi'));

				if(file_exists('assets/backend/surat_registrasi/'.$SR->file_suratregistrasi) && $SR->file_suratregistrasi) {
					unlink('assets/backend/surat_registrasi/'.$SR->file_suratregistrasi);
				}
				
					$nomor_suratregistrasi = $this->input->post('nomor_suratregistrasi');

					$thnNow = date("Y");
					$ambilnomor                 = substr("$nomor_suratregistrasi",0,4);

					$nama_file_lengkapSR 		= $_FILES['file_suratregistrasi']['name'];
					$nama_fileSR 		= substr($nama_file_lengkapSR, 0, strripos($nama_file_lengkapSR, '.'));
					$ext_fileSR		= substr($nama_file_lengkapSR, strripos($nama_file_lengkapSR, '.'));
					$tipe_fileSR		= $_FILES['file_suratregistrasi']['type'];
					$ukuran_fileSR 	= $_FILES['file_suratregistrasi']['size'];
					$tmp_fileSR 		= $_FILES['file_suratregistrasi']['tmp_name'];
					if($ukuran_fileSR > 10340000){
						$data['error'] = 'file dokumen terlalu besar';
					}
					$nama = $thnNow.'-'.$ambilnomor . $ext_fileSR;
					$pathSR = $_SERVER['DOCUMENT_ROOT'].'/Bondowoso_Bkd/assets/backend/surat_registrasi/'.$nama;
					move_uploaded_file($tmp_fileSR, $pathSR);

				$SR_edit['file_suratregistrasi'] = $nama;
			}else{
				$SR_edit['file_suratregistrasi'] = $this->input->post('file_lama');
			}
		
			$tanggalmasuk_suratregistrasi = $this->input->post('tanggalmasuk_suratregistrasi');
			$tanggalsurat_suratregistrasi = $this->input->post('tanggalsurat_suratregistrasi');
			

			$tgl_masuk                 = date('Y-m-d H:i:s', strtotime($tanggalmasuk_suratregistrasi));
            $tgl_surat = date('Y-m-d', strtotime($tanggalsurat_suratregistrasi));
			$id_surat = $this->input->post('id_suratregistrasi');

			
					$tanggal_entry  = date("Y-m-d H:i:s");
					
					$SR_edit = [

                        'tanggalmasuk_suratregistrasi' => $tgl_masuk,
						'kode_suratregistrasi' => $this->input->post('kode_suratregistrasi'),
						'nomor_suratregistrasi' => $this->input->post('nomor_suratregistrasi'),
						'nama_bagian' => $this->input->post('nama_bagian'),
						'tanggalsurat_suratregistrasi' => $tgl_surat,
						'kepada_suratregistrasi' => $this->input->post('kepada_suratregistrasi'),
						'perihal_suratregistrasi' => $this->input->post('perihal_suratregistrasi'),
						'operatorregistrasi' => $this->input->post('operatorregistrasi'),
						'tanggal_entry' => $tanggal_entry

					];

					$result = $this->admin2->SR_edit($SR_edit, $id_surat);
					if ($result > 0) {
						$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible show" role="alert">
							Data Surat Registrasi berhasil diubah.
							<a href="#" class="close text-white" data-dismiss="alert" aria-label="close">&times;</a>
						</button></div>'.$pathSR);
						redirect("admin2/surat_registrasi");
					} else {
						$data['error'] = 'Data Surat Registrasi Gagal diubah';
					}
			}
	}

	public function hapusSR($id)
	{
		$SRlist = $this->admin2->SR_by_id($id);
		var_dump($SRlist);
		
		$data = array('id_suratregistrasi' => $SRlist->id_suratregistrasi
						 );
		unlink('assets/backend/surat_registrasi/'.$SRlist->file_suratregistrasi);
		$hapusSR = $this->admin2->SR_hapus($data['id_suratregistrasi']);
			
	
			

		if ($hapusSR > 0) {

			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible show" role="alert">
					Data Surat KEluar berhasil dihapus.
					<a href="#" class="close text-white" data-dismiss="alert" aria-label="close">&times;</a>
				</button></div>');
				redirect("admin2/surat_registrasi");
			
		} else {
			$this->session->set_flashdata(
				'message',
				'<div class="alert alert-danger" role="alert">Data Gagal Diubah!</div>'
				);
		}
	}

	public function detailSR($id) {
		$data['detail_SR'] = $this->admin2->SR_by_id($id);
		$data['title'] = 'Detail data Surat Keluar';

		$this->load->view('admin2/v_SRdetail', $data);
	}

	public function downloadlap_SR()
	{
		include APPPATH.'third_party/PHPExcel/Classes/PHPExcel.php';
		date_default_timezone_set("Asia/Jakarta");

		$excelku = new PHPExcel();

		// Set properties
		$excelku->getProperties()->setCreator("Gabut Koding")
								->setLastModifiedBy("Gabut Koding");
		//ambil data
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');
		$dataSR = $this->admin2->download_lapSR($bulan, $tahun)->result();
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
		$nama_file = 'Surat Keluar-'.$bulan.'-'.$tahun;
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
			array('fill' 	=> array(
				'type'    => PHPExcel_Style_Fill::FILL_SOLID,
				'color'   => array('argb' => 'FFEEEEEE')),
				'borders' => array('bottom'=> array('style' => PHPExcel_Style_Border::BORDER_THIN),
								'right'		=> array('style' => PHPExcel_Style_Border::BORDER_MEDIUM),
								'left'	    => array('style' => PHPExcel_Style_Border::BORDER_THIN),
								'top'	    => array('style' => PHPExcel_Style_Border::BORDER_THIN)
				)
			));
			
		$bodyStylenya->applyFromArray(
			array('fill' 	=> array(
				'type'	=> PHPExcel_Style_Fill::FILL_SOLID,
				'color'	=> array('argb' => 'FFFFFFFF')),
				'borders' => array(
								'bottom'	=> array('style' => PHPExcel_Style_Border::BORDER_THIN),
								'right'		=> array('style' => PHPExcel_Style_Border::BORDER_MEDIUM),
								'left'	    => array('style' => PHPExcel_Style_Border::BORDER_THIN),
								'top'	    => array('style' => PHPExcel_Style_Border::BORDER_THIN)
				)
			));
				// Set page orientation and size
			$excelku->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
			$excelku->getActiveSheet()->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_LEGAL);
			$excelku->getActiveSheet()->getPageMargins()->setTop(0.75);
			$excelku->getActiveSheet()->getPageMargins()->setRight(0.7);
			$excelku->getActiveSheet()->getPageMargins()->setLeft(0.7);
			$excelku->getActiveSheet()->getPageMargins()->setBottom(0.75);


		$baris  = 9; //Ini untuk dimulai baris datanya, karena di baris 3 itu digunakan untuk header tabel
		$no     = 1;

		foreach ($dataSR as $SR) {
		$SI->setCellValue("A".$baris,$no++); //mengisi data untuk nomor urut
		$SI->setCellValue("B".$baris,$SR->nomor_suratkeluar); 
		$SI->setCellValue("C".$baris,$SR->tanggalkeluar_suratkeluar); 
		$SI->setCellValue("D".$baris,$SR->kode_suratkeluar); 
		$SI->setCellValue("E".$baris,$SR->nama_bagian); 
		$SI->setCellValue("F".$baris,$SR->tanggalsurat_suratkeluar); 
		$SI->setCellValue("G".$baris,$SR->kepada_suratkeluar); 
		$SI->setCellValue("H".$baris,$SR->perihal_suratkeluar); 
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
			$excelku->getActiveSheet()->getStyle('A9:F'.$baris.'')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$excelku->getActiveSheet()->getStyle('A9:H'.$baris.'')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			$excelku->getActiveSheet()->getStyle('A9:H'.$baris.'')->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
			$excelku->getActiveSheet()->getStyle('G9:H'.$baris.'')->getAlignment()->setWrapText(true);
			//wraptext
		}

		//Memberi nama sheet
		$excelku->getActiveSheet()->setTitle('DataSuratKeluar');

		$excelku->setActiveSheetIndex(0);

		// untuk excel 2007 atau yang berekstensi .xlsx
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="'.$nama_file.'".xlsx');
		header('Cache-Control: max-age=0');
		
		$objWriter = PHPExcel_IOFactory::createWriter($excelku, 'Excel2007');
		$objWriter->save('php://output');
		exit;
	}

    //tutup surat keluar


    //profile
    public function profil()
    {
        $data['title'] = 'Data Profile';

        $data['profil'] = $this->admin2->tampil_profil();

        $this->load->view('admin2/profile', $data);
    }

    public function editprofil()
    {
        $data['title'] = 'Edit Data';

        $data['profil'] = $this->admin2->tampil_profil();

        $this->load->view('admin2/editprofile', $data);
    }

    public function proses_editprofile()
    {
        $id_admin2 = $this->input->post('id_admin2');
        $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
        $data_edit = array(
            'nama_admin2' => $this->input->post('nama_admin2'),
            'username_admin2' => $this->input->post('username_admin2'),
            'password' => $password
        );


        if (!empty($_FILES['gambar']['name'])) {
            $upload = $this->_do_uploadmin();

            //delete file
            $datamin = $this->admin2->admin2_by_id($this->input->post('id_admin2'));
            if (file_exists('assets/backend/images/admin2/' . $datamin->gambar) && $datamin->gambar != 'default.jpg')
                unlink('assets/backend/images/admin2/' . $datamin->gambar);

            $data_edit['gambar'] = $upload;
            $d = $upload;
        } else {
            $data_edit['gambar'] = $this->input->post('file_lama');
            $d = $this->input->post('file_lama');
        }

        $_SESSION['gambar'] = $d;
        $result = $this->admin2->profile_edit($data_edit, $id_admin2);
        if ($result > 0) {

            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible show" role="alert">
				Data profil berhasil diubah.
				<a href="#" class="close text-white" data-dismiss="alert" aria-label="close">&times;</a>
				</button></div>');
            redirect("admin2/profil");
        } else {
            $data['error'] = 'Data profil Gagal diubah';
        }
    }

    private function _do_uploadmin()
    {
        $username = $this->input->post('username_admin2');
        $nama_file_lengkap         = $_FILES['gambar']['name'];
        $ext_file        = substr($nama_file_lengkap, strripos($nama_file_lengkap, '.'));
        $config['upload_path']          = 'assets/backend/images/admin2';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 2048; //set max size allowed in Kilobyte
        $config['max_width']            = 10000; // set max width image allowed
        $config['max_height']           = 10000; // set max height allowed
        $config['file_name']            =  $username . $ext_file; //just milisecond timestamp fot unique session_name()

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('gambar')) //upload and validate
        {
            $data['title'] = 'edit Data Surat profile';
            $data['error'] = $this->upload->display_errors();
            $this->load->view('admin2/profile', $data);
        }
        return $this->upload->data('file_name');
    }


    //tutup profile
}
