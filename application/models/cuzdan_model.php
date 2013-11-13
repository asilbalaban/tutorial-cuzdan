<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class cuzdan_model extends CI_Model
{
	function paraHareketiEkle ($data)
	{
		$sonuc = $this->db->insert('paraHareketleri', $data);
		return $sonuc;
	}

	function getParaHareketleri ($tur)
	{
		return $this->db->select('*')
		->from('paraHareketleri')
		->where('tur', $tur)
		->get()
		->result_array();
	}
}

