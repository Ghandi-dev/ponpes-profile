<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

    // Konstanta untuk nama tabel
    const TABLE_NAME = 'tb_user';

    public function __construct()
    {
        parent::__construct();
        // Load library atau helper jika diperlukan
        $this->load->database();
    }

    // Fungsi untuk mendapatkan semua pengguna
    public function get_all_users()
    {
        $query = $this->db->get(self::TABLE_NAME);
        return $query->result(); // Mengembalikan hasil sebagai array objek
    }

    // Fungsi untuk mendapatkan pengguna berdasarkan ID
    public function get_user_by_id($id)
    {
        $query = $this->db->get_where(self::TABLE_NAME, array('id' => $id));
        return $query->row(); // Mengembalikan satu objek
    }

    public function get_user_by_email($email)
    {
        $query = $this->db->get_where(self::TABLE_NAME, array('email' => $email));
        return $query->row(); // Mengembalikan satu objek
    }

    // Fungsi untuk menambah pengguna
    public function add_user($data)
    {
        return $this->db->insert(self::TABLE_NAME, $data); // Mengembalikan true/false
    }

    public function get_last_user_id()
    {
        return $this->db->insert_id();
    }

    // Fungsi untuk memperbarui pengguna
    public function update_user($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update(self::TABLE_NAME, $data); // Mengembalikan true/false
    }

    // Fungsi untuk menghapus pengguna
    public function delete_user($id)
    {
        return $this->db->delete(self::TABLE_NAME, array('id' => $id)); // Mengembalikan true/false
    }
}
