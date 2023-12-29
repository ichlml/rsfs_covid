<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_user', 'user');
    }

    public function index()
    {
        check_alerdy_login();
        $this->load->view('login');
    }

    public function auth()
    {
        $post = $this->input->post(null, true);
        $cek = $this->user->login($post);

        if($cek->num_rows() == 1)
        {
            $row = $cek->row();
            if($cek->row('level') == 'superuser')
            {
                $params = [
                    'id_user' => $row->id_user,
                    'nama_user' => $row->nama_user,
                    'user' => $row->user,
                    'pass' => $row->pass,
                    'level' => 'superuser'
                ];
                $this->session->set_userdata($params);
                redirect('welcome');
            } elseif ($cek->row('level') == 'admin') {
                $params = [
                    'id_user' => $row->id_user,
                    'nama_user' => $row->nama_user,
                    'user' => $row->user,
                    'pass' => $row->pass,
                    'level' => 'admin'
                ];
                $this->session->set_userdata($params);
                redirect('welcome');
            } elseif ($cek->row('level') == 'kepala') {
                $params = [
                    'id_user' => $row->id_user,
                    'nama_user' => $row->nama_user,
                    'user' => $row->user,
                    'pass' => $row->pass,
                    'level' => 'kepala'
                ];
                $this->session->set_userdata($params);
                redirect('welcome');
            }elseif ($cek->row('level') == 'direksi') {
                $params = [
                    'id_user' => $row->id_user,
                    'nama_user' => $row->nama_user,
                    'user' => $row->user,
                    'pass' => $row->pass,
                    'level' => 'kepala'
                ];
                $this->session->set_userdata($params);
                redirect('welcome');
            }
        }else{
            $this->session->set_flashdata('failed', 'Username atau Password Salah');
            redirect('auth');
        } 
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth');
    }
 }