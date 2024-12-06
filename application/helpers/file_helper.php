<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Cek apakah berkas lama sama dengan berkas baru,
 * dan hapus berkas lama jika berbeda.
 *
 * @param string $new_file Nama file baru.
 * @param string $old_file Nama file lama (dengan path lengkap).
 * @param string $upload_path Direktori tempat file berada.
 * @return void
 */
if (!function_exists('check_and_delete_old_file')) {
    function check_and_delete_old_file($new_file, $old_file, $upload_path)
    {
        // Jika file lama tidak ada, keluar dari fungsi
        if (!$old_file || !file_exists($upload_path . $old_file)) {
            return;
        }

        // Jika file baru sama dengan file lama, tidak perlu dihapus
        if ($new_file === $old_file) {
            return;
        }

        // Hapus file lama
        if (unlink($upload_path . $old_file)) {
            log_message('info', "File lama berhasil dihapus: " . $upload_path . $old_file);
        } else {
            log_message('error', "Gagal menghapus file lama: " . $upload_path . $old_file);
        }
    }
}
