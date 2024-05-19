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
	public function agregar_articulos()
	{
		$titulo = $this->input->post('titulo', true);
		$fecha_publicacion = $this->input->post('fecha_publicacion', true);
		$contenido = $this->input->post('contenido', true);
		$autor_id = $this->input->post('autor_id', true);
		$categoria_id = $this->input->post('categoria_id', true);


		if(empty($titulo)){
			$this->session->set_flashdata('msg_formulario', '<div class="alert alert-danger" role="alert">El título es obligatorio!</div>');
			redirect("articulos");
		}

		if(empty($fecha_publicacion)){
			$this->session->set_flashdata('msg_formulario', '<div class="alert alert-danger" role="alert">La fecha de publicación es obligatoria!</div>');
			redirect("articulos");
		}

		if(empty($contenido)){
			$this->session->set_flashdata('msg_formulario', '<div class="alert alert-danger" role="alert">El contenido es obligatorio!</div>');
			redirect("articulos");
		}

		if(empty($autor_id)){
			$this->session->set_flashdata('msg_formulario', '<div class="alert alert-danger" role="alert">El autor es obligatorio!</div>');
			redirect("articulos");
		}

		if(empty($categoria_id)){
			$this->session->set_flashdata('msg_formulario', '<div class="alert alert-danger" role="alert">La categoría es obligatoria!</div>');
			redirect("articulos");
		}

		if(!$this->api_model->verificar_autor($autor_id)){
			$this->session->set_flashdata('msg_formulario', '<div class="alert alert-danger" role="alert">El autor no existe!</div>');
			redirect("articulos");
		}
		if(!$this->api_model->verificar_categoria($categoria_id)){
			$this->session->set_flashdata('msg_formulario', '<div class="alert alert-danger" role="alert">La categoria no existe!</div>');
			redirect("articulos");
		}

		$contenido = htmlentities($contenido);

		if($this->api_model->guardar_nuevo_articulo($titulo, $fecha_publicacion, $contenido, $autor_id, $categoria_id) == true){
			$this->session->set_flashdata('msg_formulario', '<div class="alert alert-success" role="alert">Articulo agregado correctamente!</div>');
			redirect("articulos");
		}else{
			$this->session->set_flashdata('msg_formulario', '<div class="alert alert-danger" role="alert">El Articulo no fue agregado!</div>');
			redirect("articulos");
		}
	}
	public function eliminar_articulos()
	{
		$id = $this->input->post('id', true);

		if(empty($id)){
			$this->session->set_flashdata('msg_formulario', '<div class="alert alert-danger" role="alert">El ID es obligatorio!</div>');
			redirect("articulos");
		}

		if($this->api_model->eliminarArticulo($id) == true){
			$this->session->set_flashdata('msg_formulario', '<div class="alert alert-success" role="alert">Articulo eliminado correctamente!</div>');
			redirect("articulos");
		}else{
			$this->session->set_flashdata('msg_formulario', '<div class="alert alert-danger" role="alert">El Articulo no fue eliminado!</div>');
			redirect("articulos");
		}
	}
	public function eliminar_categorias()
	{
		$id = $this->input->post('id', true);

		if(empty($id)){
			$this->session->set_flashdata('msg_formulario', '<div class="alert alert-danger" role="alert">El ID es obligatorio!</div>');
			redirect("categorias");
		}

		if($this->api_model->eliminarCategorias($id) == true){
			$this->session->set_flashdata('msg_formulario', '<div class="alert alert-success" role="alert">Categoría eliminada correctamente!</div>');
			redirect("categorias");
		}else{
		$this->session->set_flashdata('msg_formulario', '<div class="alert alert-danger" role="alert">La categoría no fue eliminada!</div>');
		redirect("categorias");
		}
	}
	public function eliminar_autores()
	{
		$id = $this->input->post('id', true);

		if(empty($id)){
			$this->session->set_flashdata('msg_formulario', '<div class="alert alert-danger" role="alert">El ID es obligatorio!</div>');
			redirect("autores");
		}

		if($this->api_model->eliminarAutor($id) == true){
			$this->session->set_flashdata('msg_formulario', '<div class="alert alert-success" role="alert">Autor eliminado correctamente!</div>');
			redirect("autores");
		}else{
		$this->session->set_flashdata('msg_formulario', '<div class="alert alert-danger" role="alert">El autor no fue eliminado!</div>');
		redirect("autores");
		}
	}

	public function editar_articulos()
	{
		$id = $this->input->post('id', true);
		$titulo = $this->input->post('titulo', true);
		$contenido = $this->input->post('contenido', true);
		$autor_id = $this->input->post('autor_id', true);
		$categoria_id = $this->input->post('categoria_id', true);


		if(empty($id)){
			$this->session->set_flashdata('msg_formulario', '<div class="alert alert-danger" role="alert">El articulo es obligatorio!</div>');
			redirect("articulos");
		}

		if(empty($titulo)){
			$this->session->set_flashdata('msg_formulario', '<div class="alert alert-danger" role="alert">El título es obligatorio!</div>');
			redirect("articulos/edit/" . $id);
		}

		if(empty($contenido)){
			$this->session->set_flashdata('msg_formulario', '<div class="alert alert-danger" role="alert">El contenido es obligatorio!</div>');
			redirect("articulos/edit/" . $id);
		}

		if(empty($autor_id)){
			$this->session->set_flashdata('msg_formulario', '<div class="alert alert-danger" role="alert">El autor es obligatorio!</div>');
			redirect("articulos/edit/" . $id);
		}

		if(empty($categoria_id)){
			$this->session->set_flashdata('msg_formulario', '<div class="alert alert-danger" role="alert">La categoría es obligatoria!</div>');
			redirect("articulos/edit/" . $id);
		}

		if(!$this->api_model->verificar_autor($autor_id)){
			$this->session->set_flashdata('msg_formulario', '<div class="alert alert-danger" role="alert">El autor no existe!</div>');
			redirect("articulos/edit/" . $id);
		}
		if(!$this->api_model->verificar_categoria($categoria_id)){
			$this->session->set_flashdata('msg_formulario', '<div class="alert alert-danger" role="alert">La categoria no existe!</div>');
			redirect("articulos/edit/" . $id);
		}

		$contenido = htmlentities($contenido);

		if($this->api_model->actualizar_articulo($id, $titulo, $contenido, $autor_id, $categoria_id) == true){
			$this->session->set_flashdata('msg_formulario', '<div class="alert alert-success" role="alert">Articulo actualizado correctamente!</div>');
			redirect("articulos");
		}else{
			$this->session->set_flashdata('msg_formulario', '<div class="alert alert-danger" role="alert">El Articulo no fue actualizado!</div>');
			redirect("articulos/edit/" . $id);
		}
	}
	public function editar_categorias()
	{
		$id = $this->input->post('id', true);
		$nombre = $this->input->post('nombre', true);
		$descripcion = $this->input->post('descripcion', true);


		if(empty($id)){
			$this->session->set_flashdata('msg_formulario', '<div class="alert alert-danger" role="alert">La Categoria es obligatoria!</div>');
			redirect("categorias");
		}

		if(empty($nombre)){
			$this->session->set_flashdata('msg_formulario', '<div class="alert alert-danger" role="alert">El nombre es obligatorio!</div>');
			redirect("categorias/edit/" . $id);
		}

		if(empty($descripcion)){
			$this->session->set_flashdata('msg_formulario', '<div class="alert alert-danger" role="alert">La descripción es obligatoria!</div>');
			redirect("categorias/edit/" . $id);
		}

		if($this->api_model->actualizar_categoria($id, $nombre, $descripcion) == true){
			$this->session->set_flashdata('msg_formulario', '<div class="alert alert-success" role="alert">Categoría actualizada correctamente!</div>');
			redirect("categorias");
		}else{
			$this->session->set_flashdata('msg_formulario', '<div class="alert alert-danger" role="alert">La categoría no fue actualizada!</div>');
			redirect("categorias/edit/" . $id);
		}
	}
	public function editar_autores()
	{
		$id = $this->input->post('id', true);
		$nombre = $this->input->post('nombre', true);
		$email = $this->input->post('email', true);
		$biografia = $this->input->post('biografia', true);

		if(empty($id)){
			$this->session->set_flashdata('msg_formulario', '<div class="alert alert-danger" role="alert">El autor es obligatorio!</div>');
			redirect("autores");
		}

		if(empty($nombre)){
			$this->session->set_flashdata('msg_formulario', '<div class="alert alert-danger" role="alert">El nombre es obligatorio!</div>');
			redirect("autores/edit" . $id);
		}

		if(empty($email)){
			$this->session->set_flashdata('msg_formulario', '<div class="alert alert-danger" role="alert">El email es obligatorio!</div>');
			redirect("autores/edit" . $id);
		}

		if(empty($biografia)){
			$this->session->set_flashdata('msg_formulario', '<div class="alert alert-danger" role="alert">La biografia es obligatorio!</div>');
			redirect("autores/edit" . $id);
		}

		if($this->api_model->actualizar_autor($id, $nombre, $email, $biografia) == true){
			$this->session->set_flashdata('msg_formulario', '<div class="alert alert-success" role="alert">Autor actualizado correctamente!</div>');
			redirect("autores");
		}else{
			$this->session->set_flashdata('msg_formulario', '<div class="alert alert-danger" role="alert">El autor no fue actualizado!</div>');
			redirect("autores/edit" . $id);
		}
	}

}
