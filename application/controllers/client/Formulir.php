<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Formulir extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('user_id') == null || $this->session->userdata('role') != 1) {
            redirect('auth/login');
        }
        $this->load->model('Siswa_model');
        $this->load->model('OrangTua_model');
        $this->load->model('Alamat_model');
        $this->load->model('Berkas_model');
        $this->load->model('Pendaftaran_model');
        $this->load->model('Pembayaran_model');
        $this->load->helper('upload');
        $this->load->helper('file');

    }

    public function index()
    {
        $data['title'] = 'Formulir';
        $data['siswa'] = $this->Siswa_model->get_siswa_by_id($this->session->userdata('id_siswa'));
        $data['orangtua'] = $this->OrangTua_model->get_orang_tua_by_siswa_id($data['siswa']->id);
        $data['alamat'] = $this->Alamat_model->get_alamat_by_siswa_id($data['siswa']->id);
        $data['berkas'] = $this->Berkas_model->get_berkas_by_siswa_id($data['siswa']->id);
        // var_dump($data['siswa']);
        $this->load->view('client/formulir/index', $data);
    }

    public function update_data_siswa()
    {
        $data['siswa'] = array(
            'nama' => $this->input->post('nama'),
            'nisn' => $this->input->post('nisn'),
            'nik' => $this->input->post('nik'),
            'no_kk' => $this->input->post('no_kk'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'asal_sekolah' => $this->input->post('asal_sekolah'),
            'no_hp' => $this->input->post('no_hp'),
        );
        $data['orangtua'] = array(
            'id_siswa' => $this->session->userdata('id_siswa'),
            'nama_ayah' => $this->input->post('nama_ayah'),
            'tempat_lahir_ayah' => $this->input->post('tempat_lahir_ayah'),
            'tanggal_lahir_ayah' => $this->input->post('tanggal_lahir_ayah'),
            'pendidikan_ayah' => $this->input->post('pendidikan_ayah'),
            'pekerjaan_ayah' => $this->input->post('pekerjaan_ayah'),
            'penghasilan_ayah' => $this->input->post('penghasilan_ayah'),
            'no_hp_ayah' => $this->input->post('no_hp_ayah'),
            'nama_ibu' => $this->input->post('nama_ibu'),
            'tempat_lahir_ibu' => $this->input->post('tempat_lahir_ibu'),
            'tanggal_lahir_ibu' => $this->input->post('tanggal_lahir_ibu'),
            'pendidikan_ibu' => $this->input->post('pendidikan_ibu'),
            'pekerjaan_ibu' => $this->input->post('pekerjaan_ibu'),
            'penghasilan_ibu' => $this->input->post('penghasilan_ibu'),
            'no_hp_ibu' => $this->input->post('no_hp_ibu'),
        );

        $this->db->trans_begin();

        try {
            if (!$this->Siswa_model->update_siswa($this->session->userdata('id_siswa'), $data['siswa'])) {
                throw new Exception('Terjadi kesalahan saat memperbarui data siswa.');
            }
            if (!$this->update_orang_tua($this->session->userdata('id_siswa'), $data['orangtua'])) {
                throw new Exception('Terjadi kesalahan saat memperbarui data orang tua.');
            }

            $this->db->trans_commit();
            $this->session->set_flashdata('success', 'Data siswa berhasil diperbarui.');
            // Perbarui status pendaftaran
            $this->update_status_pendaftaran();
            redirect('client/formulir');

        } catch (Exception $e) {

            $this->db->trans_rollback();
            $this->session->set_flashdata('error', $e->getMessage());
            redirect('client/formulir');

        }
    }

    public function update_orang_tua($id_siswa, $data)
    {
        // cek apakah data orang tua sudah ada
        $orang_tua = $this->OrangTua_model->get_orang_tua_by_siswa_id($id_siswa);
        if ($orang_tua) {
            return $this->OrangTua_model->update_orang_tua($id_siswa, $data);
        } else {
            return $this->OrangTua_model->add_orang_tua($data);
        }
    }

    public function update_alamat_siswa()
    {
        $id_siswa = $this->session->userdata('id_siswa');

        // Ambil data dari input
        $data = [
            'id_siswa' => $id_siswa,
            'provinsi' => $this->input->post('provinsi'),
            'kabupaten' => $this->input->post('kabupaten'),
            'kecamatan' => $this->input->post('kecamatan'),
            'desa' => $this->input->post('desa'),
            'rt' => $this->input->post('rt'),
            'rw' => $this->input->post('rw'),
            'alamat' => $this->input->post('alamat'),
            'kode_pos' => $this->input->post('kode_pos'),
        ];

        // Periksa apakah data alamat sudah ada
        $alamat = $this->Alamat_model->get_alamat_by_siswa_id($id_siswa);

        // Tentukan tindakan (update atau tambah)
        $action = $alamat
        ? $this->Alamat_model->update_alamat($id_siswa, $data)
        : $this->Alamat_model->add_alamat($data);

        // Tampilkan notifikasi berdasarkan hasil tindakan
        if ($action) {
            $message = $alamat
            ? 'Data alamat berhasil diperbarui.'
            : 'Data alamat berhasil ditambahkan.';
            $this->session->set_flashdata('success', $message);
        } else {
            $message = $alamat
            ? 'Terjadi kesalahan saat memperbarui data alamat.'
            : 'Terjadi kesalahan saat menambahkan data alamat.';
            $this->session->set_flashdata('error', $message);
        }
        // Perbarui status pendaftaran
        $this->update_status_pendaftaran();
        // Redirect ke formulir
        redirect('client/formulir');
    }

    public function update_berkas_siswa()
    {
        // form validation
        // $this->form_validation->set_rules('kartu_keluarga', 'Kartu Keluarga', 'trim|required');
        // $this->form_validation->set_rules('akta_kelahiran', 'Akta Kelahiran', 'trim|required');
        // $this->form_validation->set_rules('ijazah', 'Ijazah', 'trim|required');

        // if (!$this->form_validation->run()) {
        //     $this->session->set_flashdata('error', validation_errors());
        //     redirect('client/formulir');
        // }

        $id_siswa = $this->session->userdata('id_siswa');

        $old_kartu_keluarga = $this->input->post('old_kartu_keluarga');
        $old_akta_kelahiran = $this->input->post('old_akta_kelahiran');
        $old_ijazah = $this->input->post('old_ijazah');

        $field_names = [
            'kartu_keluarga' => $old_kartu_keluarga,
            'akta_kelahiran' => $old_akta_kelahiran,
            'ijazah' => $old_ijazah,
        ];

        $upload_path = './assets/upload/berkas/';

        // Simpan nama file yang berhasil diupload
        $uploaded_files = [];

        foreach ($field_names as $field_name => $old_file) {
            if (empty($_FILES[$field_name]['name'])) {
                // Jika tidak ada file yang diupload, lanjutkan ke iterasi selanjutnya
                $uploaded_files[$field_name] = $old_file;
                continue;
            }
            // Panggil fungsi upload_image yang diharapkan sudah didefinisikan
            $upload = upload_image($field_name, $upload_path);

            // Proses upload
            if ($upload['status'] === false) {
                // Tangani error upload
                $this->session->set_flashdata('error', "Gagal mengupload $field_name : " . $upload['error']);
                redirect('client/formulir');
                return;
            } else {
                // Simpan nama file yang berhasil diupload
                $uploaded_files[$field_name] = $upload['data']['file_name'];

                // Hapus file lama jika ada
                if (!empty($old_file)) {
                    unlink($upload_path . $old_file);
                }
            }
        }

        // Ambil data dari input
        $data = [
            'id_siswa' => $id_siswa,
            'kartu_keluarga' => $uploaded_files['kartu_keluarga'],
            'akta_kelahiran' => $uploaded_files['akta_kelahiran'],
            'ijazah' => $uploaded_files['ijazah'],
        ];

        // Periksa apakah data alamat sudah ada
        $berkas = $this->Berkas_model->get_berkas_by_siswa_id($id_siswa);

        // Tentukan tindakan (update atau tambah)
        $action = $berkas
        ? $this->Berkas_model->update_berkas($id_siswa, $data)
        : $this->Berkas_model->add_berkas($data);

        // Tampilkan notifikasi berdasarkan hasil tindakan
        if ($action) {
            $message = $berkas
            ? 'Data berkas berhasil diperbarui.'
            : 'Data berkas berhasil ditambahkan.';
            $this->session->set_flashdata('success', $message);
        } else {
            $message = $berkas
            ? 'Terjadi kesalahan saat memperbarui data berkas.'
            : 'Terjadi kesalahan saat menambahkan data berkas.';
            $this->session->set_flashdata('error', $message);
        }

        // Perbarui status pendaftaran
        $this->update_status_pendaftaran();
        // Redirect ke formulir
        redirect('client/formulir');
    }

    public function update_status_pendaftaran()
    {
        $id_siswa = $this->session->userdata('id_siswa');
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

    public function get_provinces()
    {
        $url = "https://emsifa.github.io/api-wilayah-indonesia/api/provinces.json";
        $response = file_get_contents($url);
        echo $response;
    }

    public function get_regencies($id_province)
    {
        $url = "https://emsifa.github.io/api-wilayah-indonesia/api/regencies/$id_province.json";
        $response = file_get_contents($url);
        echo $response;
    }

    public function get_districts($id_regency)
    {
        $url = "https://emsifa.github.io/api-wilayah-indonesia/api/districts/$id_regency.json";
        $response = file_get_contents($url);
        echo $response;
    }

    public function get_villages($id_district)
    {
        $url = "https://emsifa.github.io/api-wilayah-indonesia/api/villages/$id_district.json";
        $response = file_get_contents($url);
        echo $response;
    }

}
