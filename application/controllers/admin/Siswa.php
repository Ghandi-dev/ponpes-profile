<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Siswa extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('user_id') == null || $this->session->userdata('role') != 2) {
            redirect('auth/login');
        }

        $this->load->model('Siswa_model');
        $this->load->model('User_model');
        $this->load->model('OrangTua_model');
        $this->load->model('Alamat_model');
        $this->load->model('Berkas_model');
        $this->load->helper('upload');

    }

    public function index()
    {
        $data['title'] = 'Kelola Siswa';
        $data['siswa'] = $this->Siswa_model->get_all_siswa();
        $this->load->view('admin/siswa/index', $data);
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Siswa';
        $data['siswa'] = $this->Siswa_model->get_siswa_by_id($id);
        $data['orangtua'] = $this->OrangTua_model->get_orang_tua_by_siswa_id($id);
        $data['alamat'] = $this->Alamat_model->get_alamat_by_siswa_id($id);
        $data['berkas'] = $this->Berkas_model->get_berkas_by_siswa_id($id);
        $this->load->view('admin/siswa/edit', $data);
    }

    public function update_data_siswa($id)
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
            'id_siswa' => $id,
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
            if (!$this->Siswa_model->update_siswa($id, $data['siswa'])) {
                throw new Exception('Terjadi kesalahan saat memperbarui data siswa.');
            }
            if (!$this->update_orang_tua($id, $data['orangtua'])) {
                throw new Exception('Terjadi kesalahan saat memperbarui data orang tua.');
            }

            $this->db->trans_commit();
            $this->session->set_flashdata('success', 'Data siswa berhasil diperbarui.');
            // Perbarui status pendaftaran
            redirect('admin/siswa/edit/' . $id);

        } catch (Exception $e) {

            $this->db->trans_rollback();
            $this->session->set_flashdata('error', $e->getMessage());
            redirect('admin/siswa/edit/' . $id);

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

    public function update_alamat_siswa($id)
    {
        $id_siswa = $id;

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
        // Redirect ke formulir
        redirect('admin/siswa/edit/' . $id);
    }

    public function update_berkas_siswa($id)
    {
        $id_siswa = $id;

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
                redirect('admin/siswa/edit/' . $id);
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

        // Redirect ke formulir
        redirect('admin/siswa/edit/' . $id);
    }

    public function delete($id)
    {
        if (!$this->User_model->delete_user($id)) {
            $this->session->set_flashdata('error', 'Terjadi kesalahan saat menghapus pengguna.');
            redirect('admin/siswa');
        }
        $this->session->set_flashdata('success', 'Data siswa berhasil dihapus.');
        redirect('admin/siswa');
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
