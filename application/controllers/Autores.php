<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Autores extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}
	public function autores()
	{	
		$this->load->view('dashboard/base/header');
		$this->load->view('dashboard/base/menu', array('current_page' => 'autores') );
		$this->load->view('dashboard/autores/autores');
		$this->load->view('dashboard/base/footer');
	}
}
