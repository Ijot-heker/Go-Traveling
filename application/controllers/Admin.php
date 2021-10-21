<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->db->select('wisata_perkecamatan.*, wisata.kecamatan');
        $this->db->from('wisata_perkecamatan');
        $this->db->join('wisata', 'wisata_perkecamatan.id_kecamatan=wisata.id');
        $this->db->order_by('wisata_perkecamatan.nama');

        $query = $this->db->get();
        $data['detail_wisata'] = $query->result_array();
        // var_dump($data['detail_wisata']);
        // die();

        $this->db->select('hotel_perkecamatan.*, wisata.kecamatan');
        $this->db->from('hotel_perkecamatan');
        $this->db->join('wisata', 'hotel_perkecamatan.id_hotel_perkecamatan=wisata.id');
        $query2 = $this->db->get();
        $data['detail_penginapan'] = $query2->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }

    public function role()
    {
        $data['title'] = 'Role';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get('user_role')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role', $data);
        $this->load->view('templates/footer');
    }

    public function roleAccess($role_id)
    {
        $data['title'] = 'Role Access';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

        $this->db->where('id !=', 1);
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role-access', $data);
        $this->load->view('templates/footer');
    }

    public function changeAccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('user_access_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Access Changed!</div>');
    }

    public function dataPengguna()
    {
        $data['title'] = 'Data Pengguna';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['pengguna'] = $this->db->get('user')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/data-pengguna', $data);
        $this->load->view('templates/footer');
    }

    public function hapus_pengguna($id)
    {
        $this->load->model('Admin_model', 'hapus');
        $this->hapus->hapusDataPengguna($id);
        $this->session->set_flashdata('flash_pengguna', 'Dihapus');
        redirect('admin/dataPengguna');
    }

    public function dataWisata()
    {
        $data['title'] = 'Data Wisata';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Admin_model', 'wisata');
        $data['wisata'] = $this->wisata->getWisata();

        $data['kecamatan'] = $this->db->get('wisata')->result_array();

        $this->form_validation->set_rules('id_kecamatan', 'Kecamatan', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('biaya', 'Biaya', 'required');
        $this->form_validation->set_rules('detail', 'Detail', 'required');
        $this->form_validation->set_rules('latitude', 'Latitude', 'required');
        $this->form_validation->set_rules('longitude', 'Longitude', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/data-wisata', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'id_kecamatan' => $this->input->post('id_kecamatan'),
                'nama' => $this->input->post('nama'),
                'status' => $this->input->post('status'),
                'biaya' => $this->input->post('biaya'),
                'foto' => $this->input->post('foto'),
                'detail' => $this->input->post('detail'),
                'latitude' => $this->input->post('latitude'),
                'longitude' => $this->input->post('longitude'),
                'flag_active' => $this->input->post('flag_active')
            ];

            $this->db->insert('wisata_perkecamatan', $data);
            $this->session->set_flashdata('flash_wisata', 'Ditambahkan');
            redirect('admin/dataWisata');
        }
    }

    public function detail_wisata($id)
    {
        $data['title'] = 'Detail Wisata';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->db->select('wisata_perkecamatan.*, wisata.kecamatan');
        $this->db->from('wisata_perkecamatan');
        $this->db->join('wisata', 'wisata_perkecamatan.id_kecamatan=wisata.id');
        $this->db->where('wisata_perkecamatan.id=', $id);
        $query = $this->db->get();
        $data['detail_wisata'] = $query->result_array();

        //Menampilkan 1 layout dengan mengirimkan data
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/detail-wisata', $data);
        $this->load->view('templates/footer');
    }

    public function print_wisata()
    {
        $data['title'] = 'Data Objek Wisata Bandung Barat';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Admin_model', 'wisata');
        $data['wisata'] = $this->wisata->getWisata();

        $this->load->view('print/print-wisata', $data);
    }

    public function edit_wisata()
    {
        $this->load->model('Admin_model', 'ubah');
        $this->ubah->ubah_wisata();
        $this->session->set_flashdata('flash_wisata', 'Diubah');
        redirect('admin/dataWisata');
    }

    public function hapus_wisata($id)
    {
        $this->load->model('Admin_model', 'hapus');
        $this->hapus->hapusDataWisata($id);
        $this->session->set_flashdata('flash_wisata', 'Dihapus');
        redirect('admin/dataWisata');
    }

    public function dataPenginapan()
    {
        $data['title'] = 'Data Penginapan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Admin_model', 'penginapan');
        $data['penginapan'] = $this->penginapan->getPenginapan();

        $data['kecamatan'] = $this->db->get('wisata')->result_array();

        $this->form_validation->set_rules('id_hotel_perkecamatan', 'Hotel', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('jenis', 'Jenis', 'required');
        $this->form_validation->set_rules('jumlah_kamar', 'Jumlah Kamar', 'required');
        $this->form_validation->set_rules('biaya', 'Biaya', 'required');
        $this->form_validation->set_rules('latitude', 'Latitude', 'required');
        $this->form_validation->set_rules('longitude', 'Longitude', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/data-penginapan', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'id_hotel_perkecamatan' => $this->input->post('id_hotel_perkecamatan'),
                'nama' => $this->input->post('nama'),
                'jenis' => $this->input->post('jenis'),
                'jumlah_kamar' => $this->input->post('jumlah_kamar'),
                'biaya' => $this->input->post('biaya'),
                'latitude' => $this->input->post('latitude'),
                'longitude' => $this->input->post('longitude'),
                'flag_active' => $this->input->post('flag_active')
            ];

            $this->db->insert('hotel_perkecamatan', $data);
            $this->session->set_flashdata('flash_penginapan', 'Ditambahkan');
            redirect('admin/dataPenginapan');
        }
    }

    public function detail_penginapan($id)
    {
        $data['title'] = 'Detail Penginapan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->db->select('hotel_perkecamatan.*, wisata.kecamatan');
        $this->db->from('hotel_perkecamatan');
        $this->db->join('wisata', 'hotel_perkecamatan.id_hotel_perkecamatan=wisata.id');
        $this->db->where('hotel_perkecamatan.id=', $id);
        $query = $this->db->get();
        $data['detail_penginapan'] = $query->result_array();

        //Menampilkan 1 layout dengan mengirimkan data
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/detail-penginapan', $data);
        $this->load->view('templates/footer');
    }

    public function edit_penginapan()
    {
        $this->load->model('Admin_model', 'ubah');
        $this->ubah->ubah_penginapan();
        $this->session->set_flashdata('flash_penginapan', 'Diubah');
        redirect('admin/dataPenginapan');
    }

    public function hapus_penginapan($id)
    {
        $this->load->model('Admin_model', 'hapus');
        $this->hapus->hapusPenginapan($id);
        $this->session->set_flashdata('flash_penginapan', 'Dihapus');
        redirect('admin/dataPenginapan');
    }
}
