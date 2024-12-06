<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('user_id') == null || $this->session->userdata('role') != 2) {
            redirect('auth/login');
        }
        $this->load->model('Pendaftaran_model');
        $this->load->model('Siswa_model');
        $this->load->model('Pembayaran_model');
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['pendaftaran'] = $this->Pendaftaran_model->count_not_verified();
        $data['pembayaran'] = $this->Pembayaran_model->count_not_verified();
        $data['siswa'] = $this->Siswa_model->count_siswa();
        $data['jumlah_siswa_per_tahun'] = $this->Siswa_model->count_siswa_by_year('D5');
        $this->load->view('admin/dashboard/index', $data);
    }

}
