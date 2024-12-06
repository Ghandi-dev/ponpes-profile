<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Siswa_model');
        $this->load->model('Pendaftaran_model');

    }

    public function login()
    {
        $data['title'] = 'login';
        $this->load->view('auth/login', $data);
    }

    public function login_process()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $user = $this->User_model->get_user_by_email($email); // Ambil data pengguna berdasarkan email
        if (!$user && !password_verify($password, $user->password)) {
            // Jika email atau password salah
            $this->session->set_flashdata('error', 'Email atau password salah.');
            redirect('auth/login'); // Ganti dengan URL login Anda
            return;
        }
        // Jika pengguna ditemukan dan password cocok
        $this->session->set_userdata('user_id', $user->id);
        $this->session->set_userdata('role', $user->role);
        // Redirect berdasarkan role
        if ($user->role == 1) {
            $siswa = $this->Siswa_model->get_siswa_by_user_id($user->id);
            $this->session->set_userdata('id_siswa', $siswa->id);
            $this->session->set_userdata('nama', $siswa->nama);
            redirect('client/dashboard');
        } else {
            $this->session->set_userdata('nama', 'Admin');
            redirect('admin/dashboard');
        }
    }

    public function register()
    {
        // Mulai transaksi
        $this->db->trans_begin();

        try {
            $email = $this->input->post('email');

            // Cek apakah email sudah ada
            $user = $this->User_model->get_user_by_email($email);
            if ($user) {
                throw new Exception('Email sudah terdaftar. Silakan gunakan email lain.');
            }

            // Tambahkan user
            $data_user = array(
                'email' => $this->input->post('email'),
                'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT), // Hash password
                'role' => 1, // Set role sesuai kebutuhan
                'created_at' => date('Y-m-d H:i:s'),
            );

            if (!$this->User_model->add_user($data_user)) {
                throw new Exception('Terjadi kesalahan saat menambahkan user. Silakan coba lagi.');
            }

            // Tambahkan siswa
            $id_user = $this->User_model->get_last_user_id();
            $data_siswa = array(
                'id_user' => $id_user,
                'nama' => $this->input->post('nama'),
                'no_hp' => $this->input->post('no_hp'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            );

            if (!$this->Siswa_model->add_siswa($data_siswa)) {
                throw new Exception('Terjadi kesalahan saat menambahkan siswa. Silakan coba lagi.');
            }

            // Tambahkan status pendaftaran
            $id_siswa = $this->Siswa_model->get_last_siswa_id();
            $data_status_pendaftaran = array(
                'id_siswa' => $id_siswa,
                'status' => 'D1',
            );

            if (!$this->Pendaftaran_model->add_status_pendaftaran($data_status_pendaftaran)) {
                throw new Exception('Terjadi kesalahan saat menambahkan status pendaftaran. Silakan coba lagi.');
            }

            // kirim email
            $email_to = $this->input->post('email');
            $subject = 'Pendaftaran Berhasil';
            $message = "<p>Terima kasih telah mendaftar di web Ponpes Al-Muthohhar.</p>";
            $message .= "<p>Berikut adalah detail akun Anda:</p>";
            $message .= "<p><strong>Username: </strong>" . $this->input->post('email') . "</p>";
            $message .= "<p><strong>Password: </strong>" . $this->input->post('password') . "</p>";
            $message .= "<p>Silakan login menggunakan username dan password yang tertera di atas.</p>";

            if (!$this->send_email($email_to, $subject, $message)) {
                throw new Exception('Terjadi kesalahan saat mengirim email. Silakan coba lagi.');
            };

            // Commit transaksi jika semua berhasil
            $this->db->trans_commit();

            // Redirect dengan pesan sukses
            $this->session->set_flashdata('success', 'Pendaftaran berhasil. Silakan login.');
            redirect('auth/login');

        } catch (Exception $e) {
            // Rollback transaksi jika ada kesalahan
            $this->db->trans_rollback();

            // Set flashdata dengan pesan error
            $this->session->set_flashdata('error', $e->getMessage());
            redirect('landing-page/pendaftaran/index');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('landing-page/home/index');
    }

    public function send_email($email_to, $subject, $message)
    {
        $this->load->library('email');

        // Konfigurasi pengaturan email secara manual
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://smtp.gmail.com'; // SMTP server untuk Gmail
        $config['smtp_port'] = 465; // Gunakan port 465 untuk SSL
        $config['smtp_user'] = 'ponpesalmuthohhar405@gmail.com'; // Ganti dengan email pengirim
        $config['smtp_pass'] = 'nqpy hwtw dtvd bjrt'; // Ganti dengan password email pengirim
        $config['mailtype'] = 'html'; // Kirim email dalam format HTML
        $config['charset'] = 'iso-8859-1'; // Gunakan charset yang sesuai
        $config['wordwrap'] = true;
        $config['newline'] = "\r\n"; // Untuk memisahkan baris email pada beberapa server

        // Muat konfigurasi email
        $this->email->initialize($config);

        // Pengaturan email
        $this->email->from('ponpesalmuthohhar405@gmail.com', 'Admin Pendaftaran');
        $this->email->to($email_to);
        $this->email->subject($subject);
        $this->email->message($message);

        if (!$this->email->send()) {
            // Debugger untuk melihat kesalahan email
            $debug_info = $this->email->print_debugger();
            log_message('error', 'Email Send Error: ' . $debug_info); // Log error di log aplikasi
            echo $debug_info; // Menampilkan debugger untuk troubleshooting
            return false;
        } else {
            return true; // Email berhasil dikirim
        }
    }
}
