<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pendaftaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

    }

    public function index()
    {
        $data['title'] = 'pendaftaran';
        $this->load->view('landing-page/pendaftaran/index', $data);
    }
}
