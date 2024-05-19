<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Autores extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('authors_model');
	}
	public function index()
	{	
		$autores = $this->authors_model->getAuthors();

		$this->load->view('dashboard/base/header');
		$this->load->view('dashboard/base/menu', array('current_page' => 'autores'));
		$this->load->view('dashboard/autores/autores', array('autores' => $autores));
		$this->load->view('dashboard/base/footer');
	}

	public function edit($id = null)
	{	
		if(!$id){
			redirect('autores');
		}

		$autorId = $this->authors_model->getAuthorId();

		if(!$autorId){
			redirect('autores');
		}

		$this->load->view('dashboard/base/header');
		$this->load->view('dashboard/base/menu', array('current_page' => 'autores'));
		$this->load->view('dashboard/autores/editar', array('autorId' => $autorId));
		$this->load->view('dashboard/base/footer');

	}
}
