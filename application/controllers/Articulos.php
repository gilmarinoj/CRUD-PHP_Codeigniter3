<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Articulos extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('articles_model');
	}
	public function index()
	{	
		$articulos = $this->articles_model->getArticles();
		$autores = $this->articles_model->getAuthors();
		$categorias = $this->articles_model->getCategories();
		
		$this->load->view('dashboard/base/header');
		$this->load->view('dashboard/base/menu', array('current_page' => 'articulos') );
		$this->load->view('dashboard/articulos/articulos', array('articulos' => $articulos, 'autores' => $autores, 'categorias' => $categorias));
		$this->load->view('dashboard/base/footer');
	}
}
