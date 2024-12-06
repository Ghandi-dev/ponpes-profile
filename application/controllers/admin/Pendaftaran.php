<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Pendaftaran extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('user_id') == null || $this->session->userdata('role') != 2) {
            $this->session->set_flashdata('error', 'Anda harus login terlebih dahulu.');
            redirect('auth/login');
        }
        $this->load->model('Siswa_model');
        $this->load->model('Pendaftaran_model');
    }

    public function index()
    {
        $data['title'] = 'Validasi Pendaftaran';
        $data['siswa'] = $this->Siswa_model->get_all_siswa_daftar_ulang();
        $this->load->view('admin/pendaftaran/index', $data);
    }

    public function validasi($opsi, $id)
    {
        if ($opsi == "ok") {
            $data['pendaftaran'] = array(
                'id_siswa' => $id,
                'status' => 'D5',
            );
            if ($this->Pendaftaran_model->update_status_pendaftaran($id, $data['pendaftaran'])) {
                $this->session->set_flashdata('success', 'Pendaftaran Berhasil Divalidasi');
            }
        } else {
            $catatan = $this->input->post('catatan');
            $data['pendaftaran'] = array(
                'id_siswa' => $id,
                'status' => 'D2',
            );
            if ($this->Pendaftaran_model->update_status_pendaftaran($id, $data['pendaftaran'])) {
                $this->session->set_flashdata('success', 'Pendaftaran Berhasil Ditolak');
            };
        }
        redirect('admin/pendaftaran');
    }

}
