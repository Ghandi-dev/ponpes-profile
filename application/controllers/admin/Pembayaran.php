<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Pembayaran extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('user_id') == null || $this->session->userdata('role') != 2) {
            $this->session->set_flashdata('error', 'Anda harus login terlebih dahulu.');
            redirect('auth/login');
        }
        $this->load->model('Pembayaran_model');
        $this->load->model('Pendaftaran_model');
        $this->load->model('Siswa_model');
        $this->load->model('Alamat_model');
        $this->load->model('OrangTua_model');
        $this->load->model('Berkas_model');
        $this->load->model('Pendaftaran_model');

    }

    public function index()
    {
        $data['title'] = 'Kelola Pembayaran';
        $data['pembayaran'] = $this->Pembayaran_model->get_all_pembayaran();
        $this->load->view('admin/pembayaran/index', $data);
    }

    public function validasi($opsi, $id, $id_siswa)
    {
        $data['pendaftaran'] = $this->Pendaftaran_model->get_status_pendaftaran_by_siswa_id($id_siswa);
        if ($data['pendaftaran']->status == 'D5') {
            $this->session->set_flashdata('error', 'Pendaftaran telah selesai');
            redirect('admin/pembayaran');
        }
        if ($opsi == "ok") {
            $data['pembayaran'] = array(
                'status_pembayaran' => '3',
            );
            $this->Pembayaran_model->update_pembayaran($id, $data['pembayaran']);
            $data['pendaftaran'] = array(
                'id_siswa' => $id_siswa,
                'status' => 'D2',
            );
            if ($this->Pendaftaran_model->update_status_pendaftaran($id_siswa, $data['pendaftaran'])) {
                $this->update_status_pendaftaran($id_siswa);
                $this->session->set_flashdata('success', 'Pembayaran Berhasil Divalidasi');
            }
        } else {
            $catatan = $this->input->post('catatan');
            $data['pembayaran'] = array(
                'status_pembayaran' => '2',
                'catatan' => $catatan,
            );
            $this->Pembayaran_model->update_pembayaran($id, $data['pembayaran']);
            $data['pendaftaran'] = array(
                'id_siswa' => $id_siswa,
                'status' => 'D1',
            );
            if ($this->Pendaftaran_model->update_status_pendaftaran($id_siswa, $data['pendaftaran'])) {
                $this->session->set_flashdata('success', 'Pembayaran Berhasil Ditolak');
            };
        }
        // var_dump($data['pendaftaran']);
        redirect('admin/pembayaran');
    }

    public function update_status_pendaftaran($id)
    {
        $id_siswa = $id;
        $data_siswa = $this->Siswa_model->get_siswa_by_id($id_siswa);
        $data_orangtua = $this->OrangTua_model->get_orang_tua_by_siswa_id($id_siswa);
        $data_alamat = $this->Alamat_model->get_alamat_by_siswa_id($id_siswa);
        $data_berkas = $this->Berkas_model->get_berkas_by_siswa_id($id_siswa);
        $data_pendaftaran = $this->Pendaftaran_model->get_status_pendaftaran_by_siswa_id($id_siswa);
        $data_pembayaran = $this->Pembayaran_model->get_pembayaran_by_siswa_id($id_siswa);

        if ($data_siswa && $data_alamat && $data_berkas && $data_orangtua) {
            $status = $data_pendaftaran->status == 'D5' ? 'D5' : 'D3';
            $status = $data_pembayaran->status_pembayaran != '3' ? 'D1' : $status;

            $data = [
                'id_siswa' => $id_siswa,
                'status' => $status,
            ];
            if (!$this->Pendaftaran_model->update_status_pendaftaran($id_siswa, $data)) {
                return false;
            }
            return true;
        }
    }

}
