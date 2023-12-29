<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {

    public function addUser($post)
    {
        $params =array(
            'nama_user' => $post['nama_user'],
            'jkel' => $post['jkel'],
            'user' => $post['user'],
            'pass' => $post['pass'],
            'level' => $post['level']
        );

        return $this->db->insert('tb_user', $params);
    }

    public function getUser()
    {
        return $this->db->get('tb_user');
    }

    public function editUser($post)
    {
        $params = array (
            'nama_user' => $post['nama_user'],
            'jkel' => $post['jkel'],
            'user' => $post['user'],
            'pass' => $post['pass'],
            'level' => $post['level']
        );

        $this->db->where('id_user', $post['id_user']);
        return $this->db->update('tb_user', $params);
    }

    public function delUser($id)
    {
        $this->db->where('id_user', $id);
        return $this->db->delete('tb_user');
    }

    public function login($post)
    {
        $this->db->where('user', $post['email']);
        $this->db->where('pass', $post['password']);
        return $this->db->get('tb_user');
    }
}