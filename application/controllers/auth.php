<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class auth extends Public_Controller
{

	public function __construct ()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->girisKontrol();
		redirect(base_url('auth/giris'));
	}

	public function girisKontrol ()
	{
		$girisYaptimi = $this->session->userdata('login');

		if ($girisYaptimi == true) {
			redirect('cuzdan/genelBakis');
		}		
	}

	public function giris()
	{
		$this->girisKontrol();

		if ($this->input->post() == false) {
			$this->load->view('auth/giris');
		} else {
			$parola = $this->input->post('parola');

			if ($parola == "123") {
				$this->session->set_userdata('login', true);
			}

			redirect(base_url('cuzdan/genelBakis'));
		}
	}

	public function cikis()
	{
		$this->session->unset_userdata('login');
		redirect(base_url());
	}
}

/* End of file auth.php */
/* Location: ./application/controllers/auth.php */