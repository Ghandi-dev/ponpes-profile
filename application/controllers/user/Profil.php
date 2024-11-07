<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller
{

    public function index()
    {
        $data['title'] = 'Profil';
        $this->load->view('user/profil/index', $data);
    }

    public function profil_pengasuh()
    {
        $data['title'] = 'profil-pengasuh';
        $this->load->view('user/profil/profil_pengasuh', $data);
    }

    public function visi_misi()
    {
        $data['title'] = 'visi-misi';
        $this->load->view('user/profil/visi_misi', $data);
    }
}
