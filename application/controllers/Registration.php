<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registration extends CI_Controller {


	public $session;
	public $form_validation;
	public $input;
	public $login;
	protected $title;

	/** Constructor dari Class Login */
	public function __construct()
	{
		parent::__construct();
		//$this->load->model('M_toko', 'login');
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
	public function index()
	{
		$this->form_validation->set_data($this->input->post());
		$this->form_validation->set_rules($this->cekValidasi());
		$this->form_validation->set_error_delimiters('<span class="text-danger text-sm" >', '</span>');
		if ($this->form_validation->run() === false) {
			$this->session->set_flashdata('pesan', validation_errors());
			$data['image'] = $this->_create_captcha();
			$data['title'] = $this->title;
			$data['tag'] = 'user';
			$view ='v_registration';
			$this->_layout($data,$view);
		} else {
//			$username = $this->input->post('username', TRUE);
//			$password = $this->input->post('password', TRUE);
//			$cekLogin = $this->login->validasi_login($username)->row();
//
//			if(!password_verify($password, $cekLogin->password)){
//				$this->session->set_flashdata('pesan2', '<div class="alert alert-danger" role="alert">Username atau password anda salah!</div>');
//				redirect("Login");
//			} else {
//				$data_session =
//					array(
//						'id_user' => $cekLogin->id_user,
//						'is_login_toko' => TRUE,
//					);
//				$this->session->set_userdata($data_session);
//				redirect("staff/dashboard");
//			}
		}
	}

	private function cekValidasi()
	{
		$config = array(
			array(
				'field' => 'namaLengkap',
				'label' => 'Nama Lengkap',
				'rules' => 'trim|required',
				array(
					'required' => 'Nama harus diisi!',
					'max_length' => 'Panjang karakter maksimal 50 karakter!'
				)
			)
		);
		return $config;
//		$this->form_validation->set_rules(
//			'namaLengkap',
//			'Nama Lengkap',
//			'trim|required|max_length[50]',
//
//		);
//		$this->form_validation->set_rules(
//			'nisn',
//			'NISN',
//			'trim|required|max_length[30]',
//			array(
//				'required' => 'Nisn harus diisi!',
//				'max_length' => 'Panjang karakter maksimal 30 karakter!'
//			)
//		);
//		$this->form_validation->set_rules(
//			'captcha',
//			'Captcha',
//			'trim|callback__check_captcha|required|max_length[5]',
//			array(
//				'required' => 'Captcha harus diisi!',
//				'max_length' => 'Panjang karakter captcha maksimal 5 karakter!'
//			)
//		);
	}

}
