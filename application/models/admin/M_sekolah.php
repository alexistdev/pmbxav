<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_sekolah extends CI_Model
{
	protected $admin;

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->asalSekolah = 'asal_sekolah';

	}

	/** Mendapatkan data asal sekolah */
	public function get_data_asal($id=null)
	{
		if($id != null){
			$this->db->where("$this->asalSekolah.id",$id);
		}
		$this->db->order_by("$this->asalSekolah.id", "DESC");
		return $this->db->get($this->asalSekolah);
	}


	public function getPilihanSekolah()
	{
		$query = $this->db->get($this->asalSekolah);
		$result = $query->result();

		$cat_id = array('');
		$cat_name = array('Pilih');

		for ($i = 0; $i < count($result); $i++)
		{
			array_push($cat_id, $result[$i]->id);
			array_push($cat_name, $result[$i]->nama_sekolah);
		}
		return array_combine($cat_id, $cat_name);
	}



}
