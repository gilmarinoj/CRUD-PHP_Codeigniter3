<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("api_model");
	}
	public function agregar_autores()
	{
		$nombre = $this->input->post('nombre', true);
		$email = $this->input->post('email', true);
		$biografia = $this->input->post('biografia', true);

		if(empty($nombre)){
			$this->session->set_flashdata('msg_formulario', '<div class="alert alert-danger" role="alert">El nombre es obligatorio!</div>');
			redirect("autores");
		}

		if(empty($email)){
			$this->session->set_flashdata('msg_formulario', '<div class="alert alert-danger" role="alert">El email es obligatorio!</div>');
			redirect("autores");
		}

		if(filter_var($email, FILTER_VALIDATE_EMAIL) == false){
			$this->session->set_flashdata('msg_formulario', '<div class="alert alert-danger" role="alert">El email es invalido!</div>');
			redirect("autores");
		}
		
		if(empty($biografia)){
			$biografia = null;
		}

		if($this->api_model->verificar_email_autor($email)){
			$this->session->set_flashdata('msg_formulario', '<div class="alert alert-danger" role="alert">El email ya esta en uso!</div>');
			redirect("autores");
		}

		if($this->api_model->guardar_nuevo_autor($nombre, $email, $biografia) == true){
			$this->session->set_flashdata('msg_formulario', '<div class="alert alert-success" role="alert">Autor agregado correctamente!</div>');
			redirect("autores");	
		}else{
			$this->session->set_flashdata('msg_formulario', '<div class="alert alert-danger" role="alert">El autor no fue agregado!</div>');
			redirect("autores");
		}
	}
	public function agregar_categorias()
	{
		$nombre = $this->input->post('nombre', true);
		$descripcion = $this->input->post('descripcion', true);

		if(empty($nombre)){
			$this->session->set_flashdata('msg_formulario', '<div class="alert alert-danger" role="alert">El nombre de la categoria es obligatorio!</div>');
			redirect("categorias");
		}

		if(empty($descripcion)){
			$this->session->set_flashdata('msg_formulario', '<div class="alert alert-danger" role="alert">La descripción de la categoria es obligatoria!</div>');
			redirect("categorias");
		}

		if($this->api_model->guardar_nueva_categoria($nombre, $descripcion) == true){
			$this->session->set_flashdata('msg_formulario', '<div class="alert alert-success" role="alert">Categoría agregada correctamente!</div>');
			redirect("categorias");
		}else{
			$this->session->set_flashdata('msg_formulario', '<div class="alert alert-danger" role="alert">La categoría no fue agregada!</div>');
			redirect("categorias");
		}
	}
}
