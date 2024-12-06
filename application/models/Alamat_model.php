<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Alamat_model extends CI_Model
{

    // Konstanta untuk nama tabel
    const TABLE_NAME = 'tb_alamat';

    public function __construct()
    {
        parent::__construct();
        // Load library atau helper jika diperlukan
        $this->load->database();
    }

    // Fungsi untuk mendapatkan semua alamat
    public function get_all_alamat()
    {
        $query = $this->db->get(self::TABLE_NAME);
        return $query->result(); // Mengembalikan hasil sebagai array objek
    }

    // Fungsi untuk mendapatkan alamat berdasarkan ID
    public function get_alamat_by_id($id)
    {
        $query = $this->db->get_where(self::TABLE_NAME, array('id' => $id));
        return $query->row(); // Mengembalikan satu objek
    }
    public function get_alamat_by_siswa_id($id)
    {
        $query = $this->db->get_where(self::TABLE_NAME, array('id_siswa' => $id));
        return $query->row(); // Mengembalikan satu objek
    }

    // Fungsi untuk menambah alamat
    public function add_alamat($data)
    {
        return $this->db->insert(self::TABLE_NAME, $data); // Mengembalikan true/false
    }

    public function get_last_alamat_id()
    {
        return $this->db->insert_id();
    }

    // Fungsi untuk memperbarui alamat
    public function update_alamat($id, $data)
    {
        $this->db->where('id_siswa', $id);
        return $this->db->update(self::TABLE_NAME, $data); // Mengembalikan true/false
    }

    // Fungsi untuk menghapus alamat
    public function delete_alamat($id)
    {
        return $this->db->delete(self::TABLE_NAME, array('id' => $id)); // Mengembalikan true/false
    }
}
