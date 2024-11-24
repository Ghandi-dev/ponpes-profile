<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pendidikan extends CI_Controller
{

    public function index()
    {
        $data['title'] = 'Profil';
        $this->load->view('user/profil/index', $data);
    }

    public function form()
    {
        $data['title'] = 'form';
        $this->load->view('user/pendidikan/index', $data);
    }

    public function visi_misi()
    {
        $data['title'] = 'visi-misi';
        $this->load->view('user/profil/visi_misi', $data);
    }
}
