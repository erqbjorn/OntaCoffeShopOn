<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('is_admin')) {
    function is_admin() {
        $CI =& get_instance();
        // Cek apakah user login dan role-nya admin
        if (!$CI->session->userdata('email') || $CI->session->userdata('role') != 'admin') {
            // Hapus semua session jika mencoba akses ilegal
            $CI->session->sess_destroy();
            // Redirect ke halaman 404 atau custom error page
            show_404();
            exit;
        }
    }
}

if (!function_exists('is_logged_in')) {
    function is_logged_in() {
        $CI =& get_instance();
        if (!$CI->session->userdata('email')) {
            show_404();
            exit;
        }
    }
}

// Fungsi untuk mengecek user biasa
if (!function_exists('is_user')) {
    function is_user() {
        $CI =& get_instance();
        if ($CI->session->userdata('role') == 'admin') {
            show_404();
            exit;
        }
    }
}
?>