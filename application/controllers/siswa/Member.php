<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller
{

	public $session;
	public $siswa;


	public function __construct()
	{
		parent::__construct();
		$this->load->model('registration/M_siswa', 'siswa');
		$this->idUser = $this->session->userdata('id_user');
		$this->title = "Dashboard Siswa | "._namaSekolah();
		if ($this->session->userdata('is_login_siswa') !== TRUE) {
			redirect('Login');
		}
	}

	private function _layout($data, $view)
	{
		$this->load->view('siswa/view/' . $view, $data);
	}

	public function index()
	{

		$getSiswa = $this->siswa->get_data_siswa($this->idUser);
		if($getSiswa->num_rows() != 0){
			$data = $this->_prepareData($getSiswa->row());
			$view ='v_member';
			$this->_layout($data,$view);
		} else {
			redirect('login');
		}

	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}

	private function _prepareData($siswa)
	{
		$data = array();
		$data['namaSiswa'] = $siswa->nama;
		$data['title'] = $this->title;
		return $data;
	}

}
