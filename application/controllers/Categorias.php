<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categorias extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}
	public function categorias()
	{	
		$this->load->view('dashboard/base/header');
		$this->load->view('dashboard/base/menu', array('current_page' => 'categorias') );
		$this->load->view('dashboard/categorias/categorias');
		$this->load->view('dashboard/base/footer');
	}
}
