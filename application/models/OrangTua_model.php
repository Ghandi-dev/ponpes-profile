<?php
defined('BASEPATH') or exit('No direct script access allowed');

class OrangTua_model extends CI_Model
{

    // Konstanta untuk nama tabel
    const TABLE_NAME = 'tb_orang_tua';

    public function __construct()
    {
        parent::__construct();
        // Load library atau helper jika diperlukan
        $this->load->database();
    }

    // Fungsi untuk mendapatkan semua orang tua
    public function get_all_orang_tua()
    {
        $query = $this->db->get(self::TABLE_NAME);
        return $query->result(); // Mengembalikan hasil sebagai array objek
    }

    // Fungsi untuk mendapatkan orang tua berdasarkan ID
    public function get_orang_tua_by_siswa_id($id)
    {
        $query = $this->db->get_where(self::TABLE_NAME, array('id_siswa' => $id));
        return $query->row(); // Mengembalikan satu objek
    }

    // Fungsi untuk menambah orang tua
    public function add_orang_tua($data)
    {
        return $this->db->insert(self::TABLE_NAME, $data); // Mengembalikan true/false
    }

    public function get_last_orang_tua_id()
    {
        return $this->db->insert_id();
    }

    // Fungsi untuk memperbarui orang tua
    public function update_orang_tua($id, $data)
    {
        $this->db->where('id_siswa', $id);
        return $this->db->update(self::TABLE_NAME, $data); // Mengembalikan true/false
    }

    // Fungsi untuk menghapus orang tua
    public function delete_orang_tua($id)
    {
        return $this->db->delete(self::TABLE_NAME, array('id' => $id)); // Mengembalikan true/false
    }
}
