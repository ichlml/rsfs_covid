<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rumahsakit extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_rs', 'rs');
    }

    public function rsu()
    {
        $data = [
            'rsu' => $this->rs->getRs()->result()
        ];

        $this->template->load('dashboard','admin/rsu/datars', $data);
    }

    public function addRs()
    {
        $post = $this->input->post(null, true);
        $add = $this->rs->addRs($post);
        if($add)
        {
            $this->session->set_flashdata('success', 'Data Pasien Berhasil Di Tambahkan');
            redirect('rumahsakit/rsu');
        }else {
            $this->session->set_flashdata('failed', 'Data Pasien Gagal Di Tambahkan');
            redirect('rumahsakit/rsu');
        }
    }

    public function UpRs()
    {
        $post = $this->input->post(null, true);
        $updt = $this->rs->uprs($post);
        if($updt)
        {
            $this->session->set_flashdata('success', 'Data Rumah Sakit Berhasil Di Ubah');
            redirect('rumahsakit/rsu');
        }else {
            $this->session->set_flashdata('failed', 'Data Rumah Sakit Gagal Di Ubah');
            redirect('rumahsakit/rsu');
        }
    }

    public function delrs($id = null)
    {
        if($id != null)
        {
            $del = $this->rs->delrs($id);
            if($del)
            {
                $this->session->set_flashdata('success', 'Data Rumah Sakit Berhasil Di Hapus');
                redirect('rumahsakit/rsu');
            }else {
                $this->session->set_flashdata('failed', 'Data Rumah Sakit Gagal Di Hapus');
                redirect('rumahsakit/rsu');
            }
        }
    }
}