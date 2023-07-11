<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('activite/Intensite_Physique_Model' , 'intensite');
		$this->load->model('activite/Activite_Model' , 'activite');
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		if(!isset($_SESSION['utilisateur'])){
			redirect(site_url('authentification/Login'));
		}else redirect(site_url('accueil'));
	}

	public function test()
	{
		$res = $this->intensite->obtenir_par_frequence('Infinity');
		// print_r($res);
		// $this->activite->inserer('test INsertion', 120, 1,'01:30:00');
		$this->load->view('welcome_message');
	}
}
