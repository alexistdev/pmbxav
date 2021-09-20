<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_admin extends CI_Model
{
	protected $admin;

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->admin = 'admin';

	}

	#########################################################################################
	#                                   tabel admin                     					#
	#########################################################################################

}
