<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class cuzdan extends Admin_Controller 
{

	/*

	TABLE YAPISI SQL SORGUSU
	--------------------------------------------------
	CREATE TABLE IF NOT EXISTS `paraHareketleri` (
	  `id` int(11) NOT NULL AUTO_INCREMENT,
	  `islem` varchar(25) NOT NULL,
	  `tutar` float NOT NULL,
	  `aciklama` mediumtext NOT NULL,
	  `tarih` datetime NOT NULL,
	  PRIMARY KEY (`id`)
	) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

	*/

	public function __construct ()
	{
		parent::__construct();

		$this->load->model('cuzdan_model');
	}

	public function index()
	{
		redirect(base_url('cuzdan/genelBakis'));
	}

	public function genelBakis()
	{
		// Bitiş set edildiyse
		if (isset($_GET['bitis'])) {
			// değişkene atama yap
			$data['bitisTarihi'] 		= $_GET['bitis'];	
		} else {
			$data['bitisTarihi']		= date('Y-m-d');
		}

		// Başlangıç set edildiyse
		if (isset($_GET['baslangic'])) {
			// $data['baslangicTarihi'] değişkene atama yap
			$data['baslangicTarihi'] 	= $_GET['baslangic'];
		} else {
			$data['baslangicTarihi']	= date('Y-m-d', strtotime($data['bitisTarihi']."-1 Month"));
		}

		$bitisTarihi = date('Y-m-d', strtotime($data['bitisTarihi']."+1 Day"));

		$toplamGelir = null;
		$toplamGider = null;

		$data['gelirler'] = $this->cuzdan_model->getParaHareketleri('gelir', $data['baslangicTarihi'], $bitisTarihi, $toplamGelir);
		$data['giderler'] = $this->cuzdan_model->getParaHareketleri('gider', $data['baslangicTarihi'], $bitisTarihi, $toplamGider);
		$data['toplamGelir'] = $toplamGelir;
		$data['toplamGider'] = $toplamGider;

		$this->load->view('cuzdan/genel_bakis', $data);
	}

	public function paraHareketiEkle()
	{
		$data['tutar'] 		= $this->input->post('tutar');
		$data['aciklama'] 	= $this->input->post('aciklama');
		$data['tarih']		= date('Y-m-d h:m:s');
		$data['islem']		= $this->input->post('islem');

		$sonuc = $this->cuzdan_model->paraHareketiEkle($data);

		if ($sonuc == true) {
			$this->session->set_flashdata('mesaj', "Para hareketi başarıyla eklendi");
		} else {
			$this->session->set_flashdata('mesaj-hata', "Para hareketi eklenirken bir sorun oluştu lütfen tekrar deneyin");
		}

		redirect(base_url('cuzdan/genelBakis'));

	}

}

/* End of file cuzdan.php */
/* Location: ./application/controllers/cuzdan.php */