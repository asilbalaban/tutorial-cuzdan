<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


Class Cuzdan_Model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	function paraHareketiEkle($data)
	{
		return $this->db->insert('paraHareketleri', $data);
	}

	function getParaHareketleri($islem)
	{
		return $this->db->select('*')
		->from('paraHareketleri')
		->where('islem', $islem)
		->get()
		->result_array();
	}


}