<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Wisata_model extends CI_Model
{
    public function getWisata()
    {

        $query = "SELECT `wisata_perkecamatan`.*, `wisata`.`kecamatan` FROM `wisata_perkecamatan` JOIN `wisata` ON `wisata_perkecamatan`.`id_kecamatan` = `wisata`.`id`";

        return $this->db->query($query)->result_array();
    }
}
