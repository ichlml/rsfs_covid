<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ruang extends CI_Controller {

    public function __construct()
    {
        parent:: __construct();
        $this->load->model('m_ruang','ruang');
        check_not_login();
    }

    public function kamar()
    {
        $data = [
            'getKamar' => $this->ruang->getKamar()->result()
        ];
        $this->template->load('dashboard', 'admin/kamar/datakamar', $data);
    }

    public function addKamar()
    {
        $post = $this->input->post(null, true);
        $addKamar = $this->ruang->addKamar($post); 
        if($addKamar){
            $this->session->set_flashdata('success', 'Data Kamar Berhasil Di Tambahkan');
            redirect('ruang/kamar');
        }else{
            $this->session->set_flashdata('failed', 'Data Kamar Gagal Di Tambahkan');
            redirect('ruang/kamar');
        }
    }

    public function editKamar()
    {
        $post = $this->input->post(null, true);
        $editKamar = $this->ruang->editKamar($post);
        if($editKamar)
        {
            $this->session->set_flashdata('success', 'Data Kamar Berhasil Di Ubah');
            redirect('ruang/kamar');
        } else {
            $this->session->set_flashdata('failed', 'Data Kamar Gagal Di Ubah');
            redirect('ruang/kamar');
        }
    }

    public function delKamar($id = null)
    {
        if($id != null)
        {
            $delKamar = $this->ruang->delKamar($id);
            if($delKamar){
                $this->session->set_flashdata('success', 'Data Kamar Berhasil Di Hapus');
                redirect('ruang/kamar');
            }else{
                $this->session->set_flashdata('failed', 'Data Kamar Gagal Di Hapus');
                redirect('ruang/kamar');
            }
        }
    }

    public function bed()
    {
        $data = [
            'dataKamar' => $this->ruang->getKamar()->result(),
            'countLT4' => $this->ruang->countlt4(),
            'sLT4' => $this->ruang->countsLT4(),
            'cLT4' => $this->ruang->countcLT4(),
            'countigd' => $this->ruang->countigd(),
            'sigd' => $this->ruang->countsigd(),
            'cigd' => $this->ruang->countcigd(),
            'counttd' => $this->ruang->counttd(),
            'std' => $this->ruang->countstd(),
            'ctd' => $this->ruang->countctd(),
            'counttb' => $this->ruang->counttb(),
            'stb' => $this->ruang->countstb(),
            'ctb' => $this->ruang->countctb(),
            'bed' => $this->ruang->getBed()->result()

        ];

        // print_r($data['sLT4']);
        // exit;

        $this->template->load('dashboard','admin/bed/databed', $data);
    }

    public function addBed()
    {
        $post = $this->input->post(null, true);
        $addBed = $this->ruang->addBed($post);
        if ($addBed) {
            $this->session->set_flashdata('success', 'Data Bed Berhasil Di Tambahkan');
            redirect('ruang/bed');
        }else{
            $this->session->set_flashdata('failed', 'Data Bed Gagal Di Tambahkan');
            redirect('ruang/bed');
        }

    }

    public function editBed()
    {
        $post = $this->input->post(null, true);
        // print_r($post);
        // exit;
        $editData = $this->ruang->editBed($post);
        if ($editData) {
            $this->session->set_flashdata('success', 'Data Bed Berhasil Di Ubah');
            redirect('ruang/bed');
        }else{
            $this->session->set_flashdata('failed', 'Data Bed Gagal Di Ubah');
            redirect('ruang/bed');
        }
    }

    public function delBed($id = null)
    {
        if($id != null)
        {
            $del = $this->ruang->delBed($id);
            if($del){
                $this->session->set_flashdata('success', 'Data Bed Berhasil Di Hapus');
                redirect('ruang/bed');
            }else{
                $this->session->set_flashdata('failed', 'Data Bed Gagal Di Hapus');
                redirect('ruang/bed');
            }
        }
    }


    public function aksbed()
    {
        $data['akses'] = $this->ruang->askbed()->row();
        $this->template->load('dashboard', 'admin/akses/akses', $data);
    }

    public function actAkses()
    {
        $post = $this->input->post(null, true);
        $upd = $this->ruang->updAkses($post);
        if($upd){
            $this->session->set_flashdata('success', 'Berhasil Di Ubah');
            redirect('ruang/aksbed');
        }else{
            $this->session->set_flashdata('failed', 'Gagal Di Ubah');
            redirect('ruang/aksbed');
        }
    }
}