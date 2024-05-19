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
		$search = $this->input->get('search', true);
		$articulos = $this->articles_model->getArticles($search);
		$autores = $this->articles_model->getAuthors();
		$categorias = $this->articles_model->getCategories();
		
		$this->load->view('dashboard/base/header');
		$this->load->view('dashboard/base/menu', array('current_page' => 'articulos') );
		$this->load->view('dashboard/articulos/articulos', array('articulos' => $articulos, 'autores' => $autores, 'categorias' => $categorias));
		$this->load->view('dashboard/base/footer');
	}

	public function edit($id = null)
	{	
		if($id == null){
			redirect('articulos');
		}

		$articuloid = $this->articles_model->getArticleId($id);
		$autores = $this->articles_model->getAuthors();
		$categorias = $this->articles_model->getCategories();

		if(!$articuloid){
			redirect('articulos');
		}

		$this->load->view('dashboard/base/header');
		$this->load->view('dashboard/base/menu', array('current_page' => 'articulos') );
		$this->load->view('dashboard/articulos/editar', array('articuloId' => $articuloid, 'autores' => $autores, 'categorias' => $categorias));
		$this->load->view('dashboard/base/footer');
	}

	public function view($id = null)
	{
		if($id == null){
			redirect('articulos');
		}

		$articuloid = $this->articles_model->getArticleId($id);

		if(!$articuloid){
			redirect('articulos');
		}

		$this->load->view('dashboard/base/header');
		$this->load->view('dashboard/base/menu', array('current_page' => 'articulos') );
		$this->load->view('dashboard/articulos/ver', array('articuloId' => $articuloid));
		$this->load->view('dashboard/base/footer');
		
	}
}
