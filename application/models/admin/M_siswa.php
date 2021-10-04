<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_siswa extends CI_Model
{
	protected $siswa;

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->siswa = 'identitassiswa';
	}

	public function save()
	{
		$dataSiswa = array(
			'nisn' => $this->input->post('nisn', TRUE),
			'sekolah_id' => $this->input->post('asalSekolah', TRUE),
			'tempat_lahir' => $this->input->post('tempatLahir', TRUE),
			'tgl_lahir' => strtotime($this->input->post('tanggalLahir', TRUE)),
			'agama' => $this->input->post('namaAgama', TRUE),
			'berat_bdn' => $this->input->post('beratBadan', TRUE),
			'tinggi_bdn' => $this->input->post('tinggiBadan', TRUE),
			'gol_dar' => $this->input->post('golDarah', TRUE),
			'anakke' => $this->input->post('anakke', TRUE),
			'jumlah_saudara' => $this->input->post('jmlSaudara', TRUE),
			'nohp_siswa' => $this->input->post('nomorTelepon', TRUE),
			'jenis_kel' => $this->input->post('jenisKelamin', TRUE),
			'nama' => $this->input->post('namaLengkap', TRUE),
			'password' => password_hash($this->input->post('nisn', TRUE), PASSWORD_BCRYPT),
			'status' => 1
		);
		return $this->db->insert($this->siswa, $dataSiswa);
	}


}
