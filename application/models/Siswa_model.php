<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa_model extends CI_Model
{

    // Konstanta untuk nama tabel
    const TABLE_NAME = 'tb_siswa';
    const TABLE_STATUS = 'tb_status_pendaftaran';
    const TABLE_USERS = 'tb_user';

    public function __construct()
    {
        parent::__construct();
        // Load library atau helper jika diperlukan
        $this->load->database();
    }

    // Fungsi untuk mendapatkan semua pengguna
    public function get_all_siswa()
    {
        $this->db->select(self::TABLE_NAME . '.*, pendaftaran.status');
        $this->db->from(self::TABLE_NAME);
        $this->db->join('tb_status_pendaftaran as pendaftaran', 'pendaftaran.id_siswa = ' . self::TABLE_NAME . '.id', 'inner'); // Menyesuaikan kolom yang menjadi relasi
        $this->db->where('pendaftaran.status', 'D5'); // Kondisi untuk status
        $query = $this->db->get();

        return $query->result(); // Mengembalikan hasil sebagai array objek
    }
    public function get_all_siswa_daftar_ulang()
    {
        $this->db->select(self::TABLE_NAME . '.*, pendaftaran.status');
        $this->db->from(self::TABLE_NAME);
        $this->db->join('tb_status_pendaftaran as pendaftaran', 'pendaftaran.id_siswa = ' . self::TABLE_NAME . '.id', 'inner'); // Menyesuaikan kolom yang menjadi relasi
        $this->db->where('pendaftaran.status', 'D3'); // Kondisi untuk status
        $query = $this->db->get();

        return $query->result(); // Mengembalikan hasil sebagai array objek
    }

    // Fungsi untuk mendapatkan pengguna berdasarkan ID
    public function get_siswa_by_id($id)
    {
        $query = $this->db->get_where(self::TABLE_NAME, array('id' => $id));
        return $query->row(); // Mengembalikan satu objek
    }
    public function get_siswa_by_user_id($id)
    {
        $query = $this->db->get_where(self::TABLE_NAME, array('id_user' => $id));
        return $query->row(); // Mengembalikan satu objek
    }

    //fungsi untuk menghitung jumlah siswa
    public function count_siswa()
    {
        $this->db->from(self::TABLE_STATUS); // Tabel utama
        $this->db->join(self::TABLE_NAME, self::TABLE_NAME . '.id = ' . self::TABLE_STATUS . '.id_siswa');
        $this->db->where(self::TABLE_STATUS . '.status', 'D5');
        return $this->db->count_all_results(); // Hitung jumlah baris
    }

    public function count_siswa_by_year($status)
    {
        $this->db->select("YEAR(" . self::TABLE_USERS . ".created_at) as tahun, COUNT(*) as jumlah_siswa"); // Pilih tahun dan jumlah siswa
        $this->db->from(self::TABLE_STATUS); // Tabel utama
        $this->db->join(self::TABLE_NAME, self::TABLE_NAME . '.id = ' . self::TABLE_STATUS . '.id_siswa'); // Join dengan tb_siswa
        $this->db->join(self::TABLE_USERS, self::TABLE_USERS . '.id = ' . self::TABLE_NAME . '.id_user'); // Join dengan users
        $this->db->where(self::TABLE_STATUS . '.status', $status); // Filter berdasarkan status
        $this->db->where('YEAR(' . self::TABLE_USERS . '.created_at) >=', date('Y') - 5); // Hanya tahun terakhir 5 tahun
        $this->db->group_by('YEAR(' . self::TABLE_USERS . '.created_at)'); // Kelompokkan berdasarkan tahun
        $this->db->order_by('tahun', 'ASC'); // Urutkan berdasarkan tahun

        $query = $this->db->get(); // Eksekusi query
        return $query->result(); // Mengembalikan hasil query
    }

    // Fungsi untuk menambah pengguna
    public function add_siswa($data)
    {
        return $this->db->insert(self::TABLE_NAME, $data); // Mengembalikan true/false
    }

    public function get_last_siswa_id()
    {
        return $this->db->insert_id();
    }

    // Fungsi untuk memperbarui pengguna
    public function update_siswa($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update(self::TABLE_NAME, $data); // Mengembalikan true/false
    }

    // Fungsi untuk menghapus pengguna
    public function delete_siswa($id)
    {
        return $this->db->delete(self::TABLE_NAME, array('id' => $id)); // Mengembalikan true/false
    }
}
