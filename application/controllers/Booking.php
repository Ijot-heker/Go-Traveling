<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Booking extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Pemesanan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('booking/index', $data);
        $this->load->view('templates/footer');
    }

    // public function getObjectWisata()
    // {
    //     global $conn;
    //     $m_obj = NULL;  //Master Objek
    //     $sql   = "SELECT * FROM wisata_perkecamatan where id_kecamatan > 0 order by id asc";
    //     $hasil = mysql_query($sql, $conn);
    //     while ($row = mysql_fetch_array($hasil)) {
    //         $m_obj[] = $row['id'];
    //         return $m_obj;
    //     }
    // }

    public function listtransaksi()
    {
        $data['title'] = 'List Transaksi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['list_transaksi']    = $this->db->get('transaksi')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('booking/list', $data);
        $this->load->view('templates/footer');
    }
}
