<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }
    public function guardar_nuevo_autor($nombre = null, $email = null, $biografia = null)
    {
        if($nombre == null || $email == null){
            return false;
        }

        return $this->db->insert('authors', ['name' => $nombre, 'email' => $email, 'biography' => $biografia]);
    }
    public function verificar_email_autor($email = null){
        if($email == null){
            return false;
        }

        return $this->db->get_where('authors', array('is_deleted' => false, 'email' => $email))->row_array();
    }
    public function guardar_nueva_categoria($nombre = null, $descripcion = null)
    {
        if($nombre == null || $descripcion == null){
            return false;
        }

        return $this->db->insert('categories', ['name' => $nombre, 'description' => $descripcion]);
    }
}

