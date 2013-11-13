<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class cuzdan extends Admin_Controller 
{

	public function __construct ()
	{
		parent::__construct();
	}

	public function index()
	{
		redirect(base_url('cuzdan/genelBakis'));
	}

	public function genelBakis()
	{
		echo 'Genel bakış sayfasına hoşgeldiniz. Bu sayfa sadece yöneticiler tarafından görülebilir. <a href="'.base_url('auth/cikis').'">Çıkış Yap</a>';
		var_dump($this->session->userdata('login'));
	}

}

/* End of file cuzdan.php */
/* Location: ./application/controllers/cuzdan.php */