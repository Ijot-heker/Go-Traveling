<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{
    public function getSubMenu()
    {
        $query = "SELECT `user_sub_menu`.*, `user_menu`.`menu`
                  FROM `user_sub_menu` JOIN `user_menu`
                  ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                 ";

        return $this->db->query($query)->result_array();
    }

    public function hapusDataMenu($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_menu');
    }

    public function ubah_menu()
    {
        $data = [
            "menu" => $this->input->post('menu', true)
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('user_menu', $data);
    }

    public function getMenuById($id)
    {
        return $this->db->get_where('user_menu', ['id' => $id])->row_array();
    }

    public function cariDataMenu()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('menu', $keyword);
        return $this->db->get('user_menu')->result_array();
    }

    public function hapusDataSubMenu($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_sub_menu');
    }

    public function ubah_sub_menu()
    {
        $data = [
            "menu_id" => $this->input->post('menu_id', true),
            "title" => $this->input->post('title', true),
            "url" => $this->input->post('url', true),
            "icon" => $this->input->post('icon', true),
            "flag_active" => $this->input->post('flag_active', true)
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('user_sub_menu', $data);
    }
}
