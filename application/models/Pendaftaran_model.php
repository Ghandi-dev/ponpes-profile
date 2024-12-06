<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pendaftaran_model extends CI_Model
{

    // Konstanta untuk nama tabel
    const TABLE_NAME = 'tb_status_pendaftaran';

    public function __construct()
    {
        parent::__construct();
        // Load library atau helper jika diperlukan
        $this->load->database();
    }

    // Fungsi untuk mendapatkan semua pengguna
    public function get_all_status_pendaftaran()
    {
        $query = $this->db->get(self::TABLE_NAME);
        return $query->result(); // Mengembalikan hasil sebagai array objek
    }

    public function count_not_verified()
    {
        $this->db->where('status', 'D3');
        return $this->db->count_all_results(self::TABLE_NAME);
    }

    // Fungsi untuk mendapatkan pengguna berdasarkan ID
    public function get_status_pendaftaran_by_siswa_id($id)
    {
        $query = $this->db->get_where(self::TABLE_NAME, array('id_siswa' => $id));
        return $query->row(); // Mengembalikan satu objek
    }

    // Fungsi untuk menambah pengguna
    public function add_status_pendaftaran($data)
    {
        return $this->db->insert(self::TABLE_NAME, $data); // Mengembalikan true/false
    }

    // Fungsi untuk memperbarui pengguna
    public function update_status_pendaftaran($id, $data)
    {
        $this->db->where('id_siswa', $id);
        return $this->db->update(self::TABLE_NAME, $data); // Mengembalikan true/false
    }

    // Fungsi untuk menghapus pengguna
    public function delete_status_pendaftaran($id)
    {
        return $this->db->delete(self::TABLE_NAME, array('id' => $id)); // Mengembalikan true/false
    }
}
