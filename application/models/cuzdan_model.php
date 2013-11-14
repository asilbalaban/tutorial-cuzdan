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

	function getParaHareketleri($islem, $baslangicTarihi, $bitisTarihi, &$toplam)
	{
		$toplam = $this->db->select_sum('tutar')
		->from('paraHareketleri')
		->where('islem', $islem)
		->where('tarih >', $baslangicTarihi)
		->where('tarih <', $bitisTarihi)
		->get()
		->row('tutar');

		return $this->db->select('*')
		->from('paraHareketleri')
		->where('islem', $islem)
		->where('tarih >', $baslangicTarihi)
		->where('tarih <', $bitisTarihi)
		->get()
		->result_array();
	}


}