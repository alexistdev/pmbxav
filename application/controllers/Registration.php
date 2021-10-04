<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registration extends CI_Controller {


	public $session;
	public $form_validation;
	public $input;
	public $sekolah;
	protected $title;
	public $siswa;

	/** Constructor dari Class Login */
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/M_sekolah','sekolah');
		$this->load->model('admin/M_siswa','siswa');
		$this->title = "Registrasi Penerimaan Siswa Baru | "._namaSekolah();
		if ($this->session->userdata('is_login_in') == TRUE) {
			redirect('Member');
		}
	}

	/** Template untuk memanggil view */
	private function _layout($data, $view)
	{
		$this->load->view('siswa/view/' . $view, $data);
	}

	/** Method untuk generate captcha */
	private function _create_captcha()
	{
		$cap = create_captcha(config_captcha());
		$image = $cap['image'];
		$this->session->set_userdata('captchaword', $cap['word']);
		return $image;
	}

	/** Validasi Captcha */
	public function _check_captcha($string)
	{
		if ($string == $this->session->userdata('captchaword')) {
			return TRUE;
		} else {
			$this->form_validation->set_message('_check_captcha', 'Captcha yang anda masukkan salah!');
			return FALSE;
		}
	}

	/** Validasi dropdown asal sekolah*/
	public function validate_dropdown($str)
	{
		if ($str == 'Pilih')
		{
			$this->form_validation->set_message('validate_dropdown', 'Silahkan pilih  %s terlebih dahulu');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}

	public function index()
	{

		$this->form_validation->set_data($this->input->post());
		$this->form_validation->set_rules($this->cekValidasi());
		$this->form_validation->set_error_delimiters('<span class="text-danger text-sm" >', '</span>');
		if ($this->form_validation->run() === false) {
			$this->session->set_flashdata('pesan', validation_errors());
			$data['image'] = $this->_create_captcha();
			$data['title'] = $this->title;
			$data['asalSekolah'] = $this->sekolah->getPilihanSekolah();
			$data['tag'] = 'user';
			$view ='v_registration';
			$this->_layout($data,$view);
		} else {
			$siswa = $this->siswa;
			$siswa->save();
			$this->session->set_flashdata('pesan1', '<div class="alert alert-danger" role="alert">Akun berhasil dibuat, silahkan gunakan nisn sebagai username dan password!</div>');
			redirect('login');
		}
	}



	/** Validasi input registration */
	private function cekValidasi()
	{
		$config = array(
			array(
				'field' => 'namaLengkap',
				'label' => 'nama lengkap',
				'rules' => 'trim|max_length[50]|required',
				'errors' => array(
					'required' => 'Anda harus mengisi %s.',
					'max_length' => 'Panjang karakter %s maksimal adalah 50 karakter.'
				),
			),
			array(
				'field' => 'nisn',
				'label' => 'NISN',
				'rules' => 'trim|max_length[30]|numeric|is_unique[identitassiswa.nisn]|required',
				'errors' => array(
					'required' => 'Anda harus mengisi %s.',
					'numeric' => 'Format %s harus berupa angka.',
					'max_length' => 'Panjang karakter %s maksimal adalah 30 karakter.',
					'is_unique' => '%s pernah terdaftar sebelumnya.'
				),
			),
			array(
				'field' => 'jmlSaudara',
				'label' => 'jumlah saudara',
				'rules' => 'trim|max_length[11]|numeric|required',
				'errors' => array(
					'required' => 'Anda harus mengisi %s.',
					'numeric' => 'Format %s harus berupa angka.',
					'max_length' => 'Panjang karakter %s maksimal adalah 11 karakter.'
				),
			),
			array(
				'field' => 'anakke',
				'label' => 'anak ke',
				'rules' => 'trim|max_length[10]|required',
				'errors' => array(
					'required' => 'Anda harus mengisi %s.',
					'max_length' => 'Panjang karakter %s maksimal adalah 10 karakter.'
				),
			),
			array(
				'field' => 'jenisKelamin',
				'label' => 'jenis kelamin',
				'rules' => 'trim|max_length[10]|required',
				'errors' => array(
					'required' => 'Anda harus mengisi %s.',
					'max_length' => 'Panjang karakter %s maksimal adalah 10 karakter.'
				),
			),
			array(
				'field' => 'namaAgama',
				'label' => 'Agama',
				'rules' => 'trim|max_length[20]|required',
				'errors' => array(
					'required' => 'Anda harus mengisi %s.',
					'max_length' => 'Panjang karakter %s maksimal adalah 20 karakter.'
				),
			),
			array(
				'field' => 'asalSekolah',
				'label' => 'asal sekolah',
				'rules' => 'trim|required|numeric|callback_validate_dropdown',
				'errors' => array(
					'required' => 'Anda harus mengisi %s.',
					'numeric' => 'Pilih %s dengan benar.',
				),
			),
			array(
				'field' => 'nomorTelepon',
				'label' => 'nomor telepon',
				'rules' => 'trim|required|numeric',
				'errors' => array(
					'required' => 'Anda harus mengisi %s.',
					'numeric' => 'Masukkan format %s dengan benar.',
				),
			),
			array(
				'field' => 'tempatLahir',
				'label' => 'tempat lahir',
				'rules' => 'trim|required|max_length[20]',
				'errors' => array(
					'required' => 'Anda harus mengisi %s.',
					'max_length' => 'Panjang karakter %s maksimal adalah 20 karakter.'
				),
			),
			array(
				'field' => 'tanggalLahir',
				'label' => 'tanggal lahir',
				'rules' => 'trim|required|max_length[20]',
				'errors' => array(
					'required' => 'Anda harus mengisi %s.',
					'max_length' => 'Format %s harus tanggal.'
				),
			),
			array(
				'field' => 'golDarah',
				'label' => 'golongan darah',
				'rules' => 'trim|required|max_length[1]',
				'errors' => array(
					'required' => 'Anda harus mengisi %s.',
					'max_length' => 'Anda harus memilih %s dengan benar.'
				),
			),
			array(
				'field' => 'tinggiBadan',
				'label' => 'tinggi badan',
				'rules' => 'trim|required|max_length[11]',
				'errors' => array(
					'required' => 'Anda harus mengisi %s.',
					'max_length' => 'Anda harus mengisi %s dengan benar.'
				),
			),
			array(
				'field' => 'captcha',
				'label' => 'Captcha',
				'rules' => 'trim|callback__check_captcha|required|max_length[5]',
				'errors' => array(
					'required' => 'Anda harus mengisi %s.',
					'max_length' => 'Anda harus mengisi %s dengan benar.'
				),
			),
			array(
				'field' => 'beratBadan',
				'label' => 'berat badan',
				'rules' => 'trim|required|max_length[11]',
				'errors' => array(
					'required' => 'Anda harus mengisi %s.',
					'max_length' => 'Anda harus mengisi %s dengan benar.'
				),
			),
		);
		return $config;
	}

}
