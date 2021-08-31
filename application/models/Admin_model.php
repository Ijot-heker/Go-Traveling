<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    public function getWisata()
    {
        $query = "SELECT `wisata_perkecamatan`.*, `wisata`.`kecamatan`
                  FROM `wisata_perkecamatan` JOIN `wisata`
                  ON `wisata_perkecamatan`.`id_kecamatan` = `wisata`.`id`
                 ";

        return $this->db->query($query)->result_array();
    }

    public function ubah_wisata()
    {
        $data = [
            "id_kecamatan" => $this->input->post('id_kecamatan', true),
            "nama" => $this->input->post('nama', true),
            "status" => $this->input->post('status', true),
            "biaya" => $this->input->post('biaya', true),
            "foto" => $this->input->post('foto', true),
            "detail" => $this->input->post('detail', true),
            "latitude" => $this->input->post('latitude', true),
            "longitude" => $this->input->post('longitude', true),
            "flag_active" => $this->input->post('flag_active', true)
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('wisata_perkecamatan', $data);
    }

    public function hapusDataWisata($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('wisata_perkecamatan');
    }

    public function ubah_pengguna()
    {
        $data = [
            "id_kecamatan" => $this->input->post('id_kecamatan', true),
            "nama" => $this->input->post('nama', true),
            "status" => $this->input->post('status', true),
            "biaya" => $this->input->post('biaya', true),
            "foto" => $this->input->post('foto', true),
            "flag_active" => $this->input->post('flag_active', true)
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('wisata_perkecamatan', $data);
    }

    public function hapusDataPengguna($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user');
    }

    public function getPenginapan()
    {
        $query = "SELECT `hotel_perkecamatan`.*, `wisata`.`kecamatan`
                  FROM `hotel_perkecamatan` JOIN `wisata`
                  ON `hotel_perkecamatan`.`id_hotel_perkecamatan` = `wisata`.`id`
                 ";

        return $this->db->query($query)->result_array();
    }

    public function ubah_penginapan()
    {
        $data = [
            "id_hotel_perkecamatan" => $this->input->post('id_hotel_perkecamatan', true),
            "nama" => $this->input->post('nama', true),
            "jenis" => $this->input->post('jenis', true),
            "jumlah_kamar" => $this->input->post('jumlah_kamar', true),
            "biaya" => $this->input->post('biaya', true),
            "latitude" => $this->input->post('latitude', true),
            "longitude" => $this->input->post('longitude', true),
            "flag_active" => $this->input->post('flag_active', true)
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('hotel_perkecamatan', $data);
    }

    public function hapusPenginapan($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('hotel_perkecamatan');
    }
}
