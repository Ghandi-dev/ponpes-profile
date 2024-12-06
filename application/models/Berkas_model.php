<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berkas_model extends CI_Model
{

    // Konstanta untuk nama tabel
    const TABLE_NAME = 'tb_berkas';

    public function __construct()
    {
        parent::__construct();
        // Load library atau helper jika diperlukan
        $this->load->database();
    }

    // Fungsi untuk mendapatkan semua berkas
    public function get_all_berkas()
    {
        $query = $this->db->get(self::TABLE_NAME);
        return $query->result(); // Mengembalikan hasil sebagai array objek
    }

    // Fungsi untuk mendapatkan berkas berdasarkan ID
    public function get_berkas_by_id($id)
    {
        $query = $this->db->get_where(self::TABLE_NAME, array('id' => $id));
        return $query->row(); // Mengembalikan satu objek
    }
    public function get_berkas_by_siswa_id($id)
    {
        $query = $this->db->get_where(self::TABLE_NAME, array('id_siswa' => $id));
        return $query->row(); // Mengembalikan satu objek
    }

    // Fungsi untuk menambah berkas
    public function add_berkas($data)
    {
        return $this->db->insert(self::TABLE_NAME, $data); // Mengembalikan true/false
    }

    public function get_last_berkas_id()
    {
        return $this->db->insert_id();
    }

    // Fungsi untuk memperbarui berkas
    public function update_berkas($id, $data)
    {
        $this->db->where('id_siswa', $id);
        return $this->db->update(self::TABLE_NAME, $data); // Mengembalikan true/false
    }

    // Fungsi untuk menghapus berkas
    public function delete_berkas($id)
    {
        return $this->db->delete(self::TABLE_NAME, array('id' => $id)); // Mengembalikan true/false
    }
}
