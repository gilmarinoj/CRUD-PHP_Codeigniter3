<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Articulos extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{	
		$this->load->view('dashboard/base/header');
		$this->load->view('dashboard/base/menu', array('current_page' => 'articulos') );
		$this->load->view('dashboard/articulos/articulos');
		$this->load->view('dashboard/base/footer');
	}
}
