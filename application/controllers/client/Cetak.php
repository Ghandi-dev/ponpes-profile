<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Cetak extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('user_id') == null || $this->session->userdata('role') != 1) {
            redirect('auth/login');
        }
        $this->load->model('Siswa_model');
        $this->load->model('Alamat_model');

    }

    public function index()
    {
        $data['title'] = 'Cetak Formulir';
        $data['siswa'] = $this->Siswa_model->get_siswa_by_id($this->session->userdata('id_siswa'));
        $data['alamat'] = $this->Alamat_model->get_alamat_by_siswa_id($data['siswa']->id);
        $this->load->view('client/cetak/index', $data);
    }

}
