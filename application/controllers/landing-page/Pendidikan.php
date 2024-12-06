<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pendidikan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['title'] = 'program-unggulan';
        $this->load->view('landing-page/pendidikan/index', $data);
    }

    public function tenaga_pendidik()
    {
        $data['title'] = 'tenaga-pendidik';
        $this->load->view('landing-page/pendidikan/tenaga_pendidik', $data);
    }

}
