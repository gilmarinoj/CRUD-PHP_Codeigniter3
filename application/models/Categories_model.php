<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }
    public function getCategories()
    {
        return $this->db->get_where('categories', array('is_deleted' => false))->result_array();
    }
}

