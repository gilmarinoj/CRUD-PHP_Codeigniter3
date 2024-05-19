<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categorias extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('categories_model');
	}
	public function index()
	{	
		$categorias = $this->categories_model->getCategories();

		$this->load->view('dashboard/base/header');
		$this->load->view('dashboard/base/menu', array('current_page' => 'categorias'));
		$this->load->view('dashboard/categorias/categorias', array('categorias' => $categorias));
		$this->load->view('dashboard/base/footer');
	}

	public function edit($id = null)
	{
		if(!$id){
			redirect('categorias');
		}

		$categoriaId = $this->categories_model->getCategoryId($id);

		if(!$categoriaId){
			redirect('categorias');
		}

		$this->load->view('dashboard/base/header');
		$this->load->view('dashboard/base/menu', array('current_page' => 'categorias'));
		$this->load->view('dashboard/categorias/editar', array('categoriaId' => $categoriaId));
		$this->load->view('dashboard/base/footer');
	}
}
