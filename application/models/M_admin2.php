<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_admin2 extends CI_Model
{

    public function jumlah($table)
    {
        $sql = "select * from " . $table . "";
        return $this->db->query($sql)->num_rows();
    }

    //suratmasuk

    function download_lapSM($bulan, $tahun)
    {
        $this->db->from('tb_suratregistrasi');
        $this->db->where('MONTH(tanggalsurat_suratregistrasi)', $bulan);
        $this->db->where('YEAR(tanggalsurat_suratregistrasi)', $tahun);
        $query = $this->db->get();
        return $query;
    }

    public function rulesSM()
    {
        return [
            [
                'field' => 'tanggalmasuk_suratregistrasi', 'label' => 'Tanggal Surat Registrasi', 'rules' => 'required'
            ],
            [
                'field' => 'kode_suratregistrasi', 'label' => 'Kode surat Registrasi', 'rules' => 'required'
            ],
            [
                'field' => 'nomorurut_suratregistrasi', 'label' => 'Nomor urut surat Registrasi', 'rules' => 'required'
            ],
            [
                'field' => 'nomor_suratregistrasi', 'label' => 'Nomor Surat Registrasi', 'rules' => 'required'
            ],
            [
                'field' => 'tanggalsurat_suratregistrasi', 'label' => 'Tanggal Surat Registrasi', 'rules' => 'required'
            ],
            [
                'field' => 'pengirim', 'label' => 'Pengirim', 'rules' => 'required'
            ],
            [
                'field' => 'kepada_suratregistrasi', 'label' => 'Kepada ', 'rules' => 'required'
            ],
            [
                'field' => 'perihal_suratregistrasi', 'label' => 'Perihal', 'rules' => 'required'
            ],
            [
                'field' => 'operator', 'label' => 'Operator', 'rules' => 'required'
            ],
            [
                'field' => 'disposisi1', 'label' => 'Disposisi 1', 'rules' => 'required'
            ],
            [
                'field' => 'tanggal_disposisi1', 'label' => 'Tanggal Disposisi 1', 'rules' => 'required'
            ],
            [
                'field' => 'disposisi2', 'label' => 'Disposisi 2', 'rules' => 'required'
            ],
            [
                'field' => 'tanggal_disposisi2', 'label' => 'Tanggal Disposisi 2', 'rules' => 'required'
            ],
            [
                'field' => 'disposisi3', 'label' => 'Disposisi 3', 'rules' => 'required'
            ],
            [
                'field' => 'tanggal_disposisi3', 'label' => 'Tanggal Disposisi 3', 'rules' => 'required'
            ]
        ];
    }


    function tampil_suratregistrasi()
    {
        return $this->db->get('tb_suratregistrasi');
    }

    function nomorSM()
    {

        $query = $this->db->query('SELECT * FROM tb_suratregistrasi ORDER BY nomorurut_suratregistrasi DESC LIMIT 1');
        return $query;
    }

    function disposisi()
    {
        return $this->db->get('tb_bagian');
    }

    function SM_tambah($data)
    {
        $this->db->insert('tb_suratregistrasi', $data);
        return $this->db->affected_rows();
    }

    function SM_edit($data, $id_suratregistrasi)
    {
        return $this->db->update('tb_suratregistrasi', $data, array('id_suratregistrasi' => $id_suratregistrasi));
    }

    function SM_hapus($id_suratregistrasi)
    {
        $this->db->delete('tb_suratregistrasi', array('id_suratregistrasi' => $id_suratregistrasi));
        return $this->db->affected_rows();
    }

    function SM_by_id($id)
    {
        $this->db->from('tb_suratregistrasi');
        $this->db->where('id_suratregistrasi', $id);
        $query = $this->db->get();

        return $query->row();
    }
    //tutup suratregistrasi
    // surat keluar


    function download_lapSK($bulan, $tahun)
    {
        $this->db->from('tb_suratkeluar');
        $this->db->where('MONTH(tanggalsurat_suratkeluar)', $bulan);
        $this->db->where('YEAR(tanggalsurat_suratkeluar)', $tahun);
        $query = $this->db->get();
        return $query;
    }
    public function rulesSK()
    {
        return [
            [
                'field' => 'tanggalkeluar_suratkeluar', 'label' => 'Tanggal Keluar Surat keluar', 'rules' => 'required'
            ],
            [
                'field' => 'kode_suratkeluar', 'label' => 'Kode surat Keluar', 'rules' => 'required'
            ],
            [
                'field' => 'nomor_suratkeluar', 'label' => 'Nomor surat Keluar', 'rules' => 'required'
            ],
            [
                'field' => 'nama_bagian', 'label' => 'Bagian', 'rules' => 'required'
            ],
            [
                'field' => 'tanggalsurat_suratkeluar', 'label' => 'Tanggal Surat Keluar', 'rules' => 'required'
            ],
            [
                'field' => 'kepada_suratkeluar', 'label' => 'Kepada', 'rules' => 'required'
            ],
            [
                'field' => 'perihal_suratkeluar', 'label' => 'Perihal ', 'rules' => 'required'
            ],
            [
                'field' => 'operator', 'label' => 'operator', 'rules' => 'required'
            ]
        ];
    }

    function tampil_suratkeluar()
    {
        return $this->db->get('tb_suratkeluar');
    }

    function nomorSK()
    {

        $query = $this->db->query('SELECT * FROM tb_suratkeluar ORDER BY nomor_suratkeluar DESC LIMIT 1');
        return $query;
    }

    function SK_tambah($data)
    {
        $this->db->insert('tb_suratkeluar', $data);
        return $this->db->affected_rows();
    }

    function SK_by_id($id)
    {
        $this->db->from('tb_suratkeluar');
        $this->db->where('id_suratkeluar', $id);
        $query = $this->db->get();

        return $query->row();
    }

    function SK_edit($data, $id_suratkeluar)
    {
        return $this->db->update('tb_suratkeluar', $data, array('id_suratkeluar' => $id_suratkeluar));
    }

    function SK_hapus($id_suratkeluar)
    {
        $this->db->delete('tb_suratkeluar', array('id_suratkeluar' => $id_suratkeluar));
        return $this->db->affected_rows();
    }

    // tutup surata keluar

    // bagian
    function tampil_bagian()
    {
        return $this->db->get('tb_bagian');
    }

    public function rulesBagian()
    {
        return [
            [
                'field' => 'nama_bagian', 'label' => 'Nama bagian', 'rules' => 'required'
            ],
            [
                'field' => 'username_admin_bagian', 'label' => 'Username Admin Bagian', 'rules' => 'required'
            ],
            [
                'field' => 'password_bagian', 'label' => 'Password Bagian', 'rules' => 'required'
            ],
            [
                'field' => 'nama_lengkap', 'label' => 'Nama Lengkap', 'rules' => 'required'
            ],
            [
                'field' => 'tanggal_lahir_bagian', 'label' => 'Tanggal Lahir', 'rules' => 'required'
            ],
            [
                'field' => 'alamat', 'label' => 'Alamat', 'rules' => 'required'
            ],
            [
                'field' => 'no_hp_bagian', 'label' => 'Nomer Handphone ', 'rules' => 'trim|required|min_length[10]|max_length[15]'
            ]
        ];
    }

    function bagian_tambah($data)
    {
        $this->db->insert('tb_bagian', $data);
        return $this->db->affected_rows();
    }

    function bagian_by_id($id)
    {
        $this->db->from('tb_bagian');
        $this->db->where('id_bagian', $id);
        $query = $this->db->get();

        return $query->row();
    }

    function bagian_edit($data, $id_bagian)
    {
        return $this->db->update('tb_bagian', $data, array('id_bagian' => $id_bagian));
    }

    function bagian_hapus($id_bagian)
    {
        $this->db->delete('tb_bagian', array('id_bagian' => $id_bagian));
        return $this->db->affected_rows();
    }
    // tutup bagian
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
