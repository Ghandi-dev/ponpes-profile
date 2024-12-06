<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('user_id') == null || $this->session->userdata('role') != 1) {
            redirect('auth/login');
        }
        $this->load->model('Pendaftaran_model');

    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['pendaftaran'] = $this->Pendaftaran_model->get_status_pendaftaran_by_siswa_id($this->session->userdata('id_siswa'));
        $this->load->view('client/dashboard/index', $data);
    }

}
