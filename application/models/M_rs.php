<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_rs extends CI_Model {

    public function getRS()
    {
        return $this->db->get('tb_rs');
    }

    public function addRs($post)
    {
        $params = [
            'id_rs' => $post['id_rs'],
            'nama_rs' => $post['nama_rs'],
            'alamat' => $post['alamat'],
            'email' => $post['email'],
            'telp' => $post['telp']
        ];

        return $this->db->insert('tb_rs', $params);
    }

    public function uprs($post)
    {
        $params = [
            'nama_rs' => $post['nama_rs'],
            'alamat' => $post['alamat'],
            'email' => $post['email'],
            'telp' => $post['telp']
        ];
            $this->db->where('id_rs', $post['id_rs']);
            return $this->db->update('tb_rs', $params);
    }

    public function delrs($id)
    {
        $this->db->where('id_rs', $id);
        return $this->db->delete('tb_rs');
    }

}