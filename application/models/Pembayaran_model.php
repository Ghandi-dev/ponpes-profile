<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembayaran_model extends CI_Model
{
    // Konstanta untuk nama tabel
    const TABLE_NAME = 'tb_pembayaran';

    public function __construct()
    {
        parent::__construct();
        // Load library atau helper jika diperlukan
        $this->load->database();
    }

    // Fungsi untuk mendapatkan semua pembayaran
    public function get_all_pembayaran()
    {
        // Melakukan join antara tabel pembayaran dan tb_siswa berdasarkan id_siswa
        $this->db->select('pembayaran.*, tb_siswa.nama'); // Memilih semua kolom dari pembayaran dan kolom nama dari tb_siswa
        $this->db->from(self::TABLE_NAME . ' AS pembayaran');
        $this->db->join('tb_siswa', 'tb_siswa.id = pembayaran.id_siswa'); // Melakukan join berdasarkan id_siswa
        // $this->db->order_by('pembayaran.tanggal_pembayaran', 'DESC');
        $this->db->order_by('pembayaran.status_pembayaran', 'ASC');
        $query = $this->db->get(); // Menjalankan query
        return $query->result(); // Mengembalikan hasil sebagai array objek
    }

    // Fungsi untuk mendapatkan pembayaran berdasarkan ID
    public function get_pembayaran_by_id($id)
    {
        $query = $this->db->get_where(self::TABLE_NAME, array('id' => $id));
        return $query->row(); // Mengembalikan satu objek
    }

    // Fungsi untuk mendapatkan pembayaran berdasarkan ID
    public function get_pembayaran_by_siswa_id($id)
    {
        $query = $this->db->get_where(self::TABLE_NAME, array('id_siswa' => $id));
        return $query->row(); // Mengembalikan satu objek
    }

    // fungsi untuk menghitung jumlah pembayaran
    public function count_not_verified()
    {
        $this->db->where('status_pembayaran', '1');
        return $this->db->count_all_results(self::TABLE_NAME);
    }

    // Fungsi untuk menambah pembayaran
    public function add_pembayaran($data)
    {
        return $this->db->insert(self::TABLE_NAME, $data); // Mengembalikan true/false
    }

    public function get_last_insert_id()
    {
        return $this->db->insert_id();
    }

    // Fungsi untuk memperbarui pembayaran
    public function update_pembayaran($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update(self::TABLE_NAME, $data); // Mengembalikan true/false
    }

    // Fungsi untuk menghapus pembayaran
    public function delete_pembayaran($id)
    {
        return $this->db->delete(self::TABLE_NAME, array('id' => $id)); // Mengembalikan true/false
    }
}
