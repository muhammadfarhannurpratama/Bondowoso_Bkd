<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_admin2 extends CI_Model
{

    public function jumlah($table)
    {
        $sql = "select * from " . $table . "";
        return $this->db->query($sql)->num_rows();
    }

    //suratregistrasi

    function download_lapSR($bulan, $tahun){
		$this->db->from('tb_suratregistrasi');
		$this->db->where('MONTH(tanggalsurat_suratregistrasi)',$bulan);
		$this->db->where('YEAR(tanggalsurat_suratregistrasi)',$tahun);
		$query = $this->db->get();
		return $query;
	}
	public function rulesSR()
	{
		return [
			[
				'field' => 'tanggalmasuk_suratregistrasi', 'label' => 'Tanggal Masuk Surat Registrasi', 'rules' => 'required'
			],
			[
				'field' => 'kode_suratregistrasi', 'label' => 'Kode surat Registrasi', 'rules' => 'required'
			],
            [
				'field' => 'nomor_suratregistrasi', 'label' => 'Nomor surat Registrasi', 'rules' => 'required'
			],
			[
				'field' => 'nama_bagian', 'label' => 'Bagian', 'rules' => 'required'
			],
			[
				'field' => 'tanggalsurat_suratregistrasi', 'label' => 'Tanggal Surat Registrasi', 'rules' => 'required'
			],
			[
				'field' => 'kepada_suratregistrasi', 'label' => 'Kepada Surat Registrasi', 'rules' => 'required'
			],
			[
				'field' => 'perihal_suratregistrasi', 'label' => 'Perihal Surat Registrasi ', 'rules' => 'required'
			],
			[
				'field' => 'operatorregistrasi', 'label' => 'operator', 'rules' => 'required'
			]
		];
	}

	function tampil_suratregistrasi(){
		return $this->db->get('tb_suratregistrasi');
	}

	function nomorSR() {
	
		$query=$this->db->query('SELECT * FROM tb_suratregistrasi ORDER BY nomor_suratregistrasi DESC LIMIT 1');
		return $query;
	}


	function SR_tambah($data) {
		$this->db->insert('tb_suratregistrasi', $data);
		return $this->db->affected_rows();
	}

	function SR_by_id($id) {
		$this->db->from('tb_suratregistrasi');
		$this->db->where('id_suratregistrasi',$id);
		$query = $this->db->get();

		return $query->row();
	}

	function SR_edit($data, $id_suratregistrasi) {
		return $this->db->update('tb_suratregistrasi', $data, array('id_suratregistrasi' => $id_suratregistrasi));
	}

	function SR_hapus($id_suratregistrasi)
	{
		$this->db->delete('tb_suratregistrasi', array('id_suratregistrasi' => $id_suratregistrasi));
		return $this->db->affected_rows();
	}


    // tutup surata keluar

    // bagian
    
    function tampil_profil()
    {
        $this->db->from('tb_admin2');
        $this->db->where('nama_admin2', $this->userdata['nama']);
        $query = $this->db->get();

        return $query->row();
    }

    function admin2_by_id($id)
    {
        $this->db->from('tb_admin2');
        $this->db->where('id_admin2', $id);
        $query = $this->db->get();

        return $query->row();
    }

    function profile_edit($data, $id_admin2)
    {
        return $this->db->update('tb_admin2', $data, array('id_admin2' => $id_admin2));
    }
}
