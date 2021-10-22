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

    public function getPaketWisata($unit = 'miles')
    {
        $data['title'] = 'Wisata Kunjungan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('dana', 'Dana', 'required|trim');
        $this->form_validation->set_rules('tanggal_berangkat', 'Tanggal Berangkat', 'required|trim');
        $this->form_validation->set_rules('tanggal_pulang', 'Tanggal Pulang', 'required|trim');

        //Menghitung waktu keberangkatan
        $tgl1 = new DateTime($this->input->post('tanggal_berangkat'));
        $tgl2 = new DateTime($this->input->post('tanggal_pulang'));
        $diff  = date_diff($tgl1, $tgl2);
        $total = $diff->days + 1;
        $data['hari'] = $total;

        //Mengambil data dari database
        $dana = $this->input->post('dana') / $total;
        $banyak_penginapan = $total * 1;
        $this->db->select('*');
        $this->db->from('hotel_perkecamatan');
        $this->db->limit($banyak_penginapan);
        $this->db->where('biaya<=', $dana);
        $query = $this->db->get();
        $data['penginapan'] = $query->result_array();


        $banyak_wisata = $total * 5;
        $this->db->select('*');
        $this->db->from('wisata_perkecamatan');
        $this->db->limit($banyak_wisata);
        $this->db->where('biaya<=', $this->input->post('dana'));
        $query = $this->db->get();
        $data['wisata'] = $query->result_array();
        
        //Membagi data wisata pertabel
        $hari = $banyak_wisata/5;
        $array_wisata = array();
        
        //Fungsi menambahkan array pada tiap 5 objek wisata
        $increment = 0;
        for($i = 0; $i <= $hari-1; $i++){
            for ($j=0+$increment; $j <= 4+$increment ; $j++) { 
                $array_wisata[$i][$j] =  $data['wisata'][$j];
            }
            $increment = $increment+5;
        }
        $data['array_wisata'] = $array_wisata;

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('booking/index', $data);
            $this->load->view('templates/footer');
        } else {
            //Fungsi booking
            if ($this->input->post('dana') < 200000) {
                $this->session->set_flashdata('flash_booking', 'harga');
                redirect('booking/index');
            } elseif ($this->input->post('dana') < 700000 && $total > 1) {
                $this->session->set_flashdata('flash_hari', 'hari');
                redirect('booking/index');
            } elseif ($total > 6) {
                print("Gak boleh lama-lama");
                $this->session->set_flashdata('flash_minggu', 'minggu');
                redirect('booking/index');
            } else {
                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('booking/wisata_kunjungan', $data);
                $this->load->view('templates/footer');

                //Menghitung jarak antar objek wisata
                $theta = 107.6551856006237 - 107.62194589692729;
                $distance = (sin(deg2rad(-6.830721181652593)) * sin(deg2rad(-6.798326240692311))) + (cos(deg2rad(-6.830721181652593)) * cos(deg2rad(-6.798326240692311)) * cos(deg2rad($theta)));
                $distance = acos($distance);
                $distance = rad2deg($distance);
                $distance = $distance * 60 * 1.1515;
                // var_dump($distance);
                // die();
                switch ($unit) {
                    case 'miles':
                        break;
                    case 'kilometers':
                        $distance = $distance * 1.609344;
                }
                return (round($distance, 2));
            }
        }
    }

    public function simpanKunjungan()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('email', $this->session->userdata('email'));
        $query = $this->db->get();
        $user = $query->row();

        $kode = "BOK";
        //Menyimpan data ke tabel transaksi
        $data = [
            'order_id' => $kode . uniqid(),
            'nama'     => $user->name,
            'email'    => htmlspecialchars($this->session->userdata('email', true)),
            'phone'    => $user->no_tlp,
            'layanan'  => 'Payment Gateway',
            'tanggal_booking'    => date('Y-m-d'),
            'tanggal_berangkat'  => $this->input->post('tanggal_berangkat1'),
            'tanggal_pulang'     => $this->input->post('tanggal_pulang'),
            'jumlah_bayar'       => $this->input->post('jumlah_bayar'),
            'transaction_status' => 'Pending'
        ];
        $this->db->insert('transaksi', $data);

        //Menyimpan data ke tabel detail_pemesanan
        $nama_wisata = "";
        $tanggal_berangkat = "";
        $harga = "";
        $i = 0;
        foreach ($_POST['nama_wisata'] as $wisata) {
            if ($i == 0) {
                $nama_wisata = $wisata;
                $tanggal_berangkat = $_POST['tanggal_berangkat'][$i];
                $harga = $_POST['biaya'][$i];
            } else {
                $nama_wisata = $nama_wisata . ";" . $wisata;
                $tanggal_berangkat = $tanggal_berangkat . ";" . $_POST['tanggal_berangkat'][$i];
                $harga = $harga . ";" . $_POST['biaya'][$i];
            }
            $i++;
        }

        $data2 = [
            'id_transaksi' => $data['order_id'],
            'kunjungan'    => $nama_wisata,
            'tanggal'      => $tanggal_berangkat,
            'harga'        => $harga
        ];

        $this->db->insert('detail_pemesanan', $data2);

        $this->session->set_flashdata('flash_pesan', 'dipilih');
        redirect('booking/listtransaksi');
    }

    public function listtransaksi()
    {
        $data['title'] = 'List Transaksi';
        $data['user']  = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('email', $this->session->userdata('email'));
        $query = $this->db->get();
        $data['transaksi'] = $query->result_array();

        // var_dump($data['transaksi']);
        // die();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('booking/list', $data);
        $this->load->view('templates/footer');
    }

    public function detail_pemesanan($id)
    {
        $data['title'] = 'Detail Pemesanan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->db->select('transaksi.*, detail_pemesanan.*');
        $this->db->from('transaksi');
        $this->db->join('detail_pemesanan', 'transaksi.order_id=detail_pemesanan.id_transaksi');
        $this->db->where('transaksi.order_id=', $id);
        $query = $this->db->get();
        $data['detail_transaksi'] = $query->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('booking/detail_pemesanan', $data);
        $this->load->view('templates/footer');
    }

    public function print_kunjungan($id)
    {
        $data['title'] = 'Daftar Kunjungan Wisata';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->db->select('transaksi.*, detail_pemesanan.*');
        $this->db->from('transaksi');
        $this->db->join('detail_pemesanan', 'transaksi.order_id=detail_pemesanan.id_transaksi');
        $this->db->where('transaksi.order_id=', $id);
        $query = $this->db->get();
        $data['detail_transaksi'] = $query->result_array();

        $this->load->view('print/print-kunjungan', $data);
    }
}
