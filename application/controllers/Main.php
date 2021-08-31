<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Aplikasi Wisata';

        //Mengambil data wisata dari database
        $this->load->model('Wisata_model', 'wisata');
        $data['fotoWisata'] = $this->wisata->getWisata();

        //Menampilkan 1 layout dengan mengirimkan data
        $this->load->view('main/header', $data);
        $this->load->view('main/index', $data);
        $this->load->view('main/footer', $data);
    }

    public function detail_portofolio($id)
    {
        $data['title'] = 'Aplikasi Wisata';

        $this->db->select('wisata_perkecamatan.*, wisata.kecamatan');
        $this->db->from('wisata_perkecamatan');
        $this->db->join('wisata', 'wisata_perkecamatan.id_kecamatan=wisata.id');
        $this->db->where('wisata_perkecamatan.id=', $id);
        $query = $this->db->get();
        $data['detail'] = $query->result_array();


        //Menampilkan 1 layout dengan mengirimkan data
        $this->load->view('main/portofolio', $data);
        $this->load->view('main/footer');
    }
}
