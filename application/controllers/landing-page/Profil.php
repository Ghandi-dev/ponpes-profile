<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['title'] = 'Profil';
        $this->load->view('landing-page/profil/index', $data);
    }

    public function profil_pengasuh()
    {
        $data['title'] = 'profil-pengasuh';
        $this->load->view('landing-page/profil/profil_pendiri', $data);
    }

    public function visi_misi()
    {
        $data['title'] = 'visi-misi';
        $this->load->view('landing-page/profil/visi_misi', $data);
    }
}
