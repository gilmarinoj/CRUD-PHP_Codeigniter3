<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $this->load->view('welcome_message');
    }
}

