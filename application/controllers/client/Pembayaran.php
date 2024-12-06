<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Pembayaran extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('user_id') == null || $this->session->userdata('role') != 1) {
            redirect('auth/login');
        }
        $this->load->model('Siswa_model');
        $this->load->model('Pembayaran_model');
        $this->load->helper('upload');

    }

    public function index()
    {
        $data['title'] = 'Pembayaran';
        $data['siswa'] = $this->Siswa_model->get_siswa_by_id($this->session->userdata('id_siswa'));
        $data['pembayaran'] = $this->Pembayaran_model->get_pembayaran_by_siswa_id($data['siswa']->id);
        // print_r($data['siswa']);
        $this->load->view('client/pembayaran/index', $data);
    }

    public function pembayaran_proses()
    {
        $id_siswa = $this->input->post('id_siswa');
        $jumlah = $this->input->post('jumlah');
        $tanggal = $this->input->post('tanggal');
        $file_name = 'default.jpg';

        $cek_data = $this->Pembayaran_model->get_pembayaran_by_siswa_id($id_siswa);

        if ($cek_data != null) {
            if ($cek_data->status_pembayaran == 2) {
                $this->update_pembayaran($cek_data->id);
                return;
            }
            $this->session->set_flashdata('error', 'Pembayaran sudah ada.');
            redirect('client/pembayaran');
            return;
        }

        $upload = upload_image('file', './assets/upload/bukti-pembayaran/');

        if ($upload['status'] === true) {
            $file_name = $upload['data']['file_name'];
        } else {
            $this->session->set_flashdata('error', $upload['error']);
            redirect('client/pembayaran');
            return;
        }

        $data = array(
            'id_siswa' => $id_siswa,
            'jumlah' => $jumlah,
            'tanggal_pembayaran' => $tanggal,
            'bukti_pembayaran' => $file_name,
            'status_pembayaran' => "1",
        );

        if (!$this->Pembayaran_model->add_pembayaran($data)) {
            $this->session->set_flashdata('error', 'Pembayaran gagal ditambahkan.');
            redirect('client/pembayaran');
        }

        $this->session->set_flashdata('success', 'Pembayaran berhasil ditambahkan.');
        redirect('client/pembayaran');
    }

    public function update_pembayaran($id)
    {
        $id_siswa = $this->input->post('id_siswa');
        $jumlah = $this->input->post('jumlah');
        $tanggal = $this->input->post('tanggal');
        $file_name = 'default.jpg';

        $upload = upload_image('file', './assets/upload/bukti-pembayaran/');

        if ($upload['status'] === true) {
            $file_name = $upload['data']['file_name'];
            unlink('./assets/upload/bukti-pembayaran/' . $this->input->post('old_file'));
        } else {
            $this->session->set_flashdata('error', $upload['error']);
            redirect('client/pembayaran');
            return;
        }

        $data = array(
            'id_siswa' => $id_siswa,
            'jumlah' => $jumlah,
            'tanggal_pembayaran' => $tanggal,
            'bukti_pembayaran' => $file_name,
            'status_pembayaran' => "1",
        );

        if (!$this->Pembayaran_model->update_pembayaran($id, $data)) {
            $this->session->set_flashdata('error', 'Pembayaran gagal diperbarui.');
            redirect('client/pembayaran');
        }

        $this->session->set_flashdata('success', 'Pembayaran berhasil diperbarui.');
        redirect('client/pembayaran');
    }

}
