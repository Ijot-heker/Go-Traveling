<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Menu Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['menu'] = $this->db->get('user_menu')->result_array();
        if ($this->input->post('keyword')) {
            $this->load->model('Menu_model', 'cari');
            $data['menu'] = $this->cari->cariDataMenu();
        }
        $this->form_validation->set_rules('menu', 'Menu', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
            $this->session->set_flashdata('flash_menu', 'Ditambahkan');
            redirect('menu');
        }
    }

    public function edit_menu()
    {
        $this->load->model('Menu_model', 'ubah');
        $this->ubah->ubah_menu();
        $this->session->set_flashdata('flash_menu', 'Diubah');
        redirect('menu');
    }

    public function hapus_menu($id)
    {
        $this->load->model('Menu_model', 'hapus');
        $this->hapus->hapusDataMenu($id);
        $this->session->set_flashdata('flash_menu', 'Dihapus');
        redirect('menu');
    }

    public function submenu()
    {
        $data['title'] = 'Submenu Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Menu_model', 'menu');
        $data['subMenu'] = $this->menu->getSubMenu();

        $data['menu']    = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');


        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'flag_active' => $this->input->post('flag_active')
            ];

            $this->db->insert('user_sub_menu', $data);
            $this->session->set_flashdata('flash_sub_menu', 'Ditambahkan');
            redirect('menu/submenu');
        }
    }

    public function edit_sub_menu()
    {
        $this->load->model('Menu_model', 'ubah');
        $this->ubah->ubah_sub_menu();
        $this->session->set_flashdata('flash_sub_menu', 'Diubah');
        redirect('menu/submenu');
    }

    public function hapus_sub_menu($id)
    {
        $this->load->model('Menu_model', 'hapus');
        $this->hapus->hapusDataSubMenu($id);
        $this->session->set_flashdata('flash_sub_menu', 'Dihapus');
        redirect('menu/submenu');
    }
}
