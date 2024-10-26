<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function index()
    {
        $data['title'] = 'Beranda';
        $this->load->view('user/beranda/index', $data);
    }
}
