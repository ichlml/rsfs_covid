<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct()
    {
        parent :: __construct();
        $this->load->model('m_user', 'user');
        check_not_login();
    }

	public function index()
	{
		$data = array(
            'user' => $this->user->getUser()->result()
        );

        $this->template->load('dashboard','admin/user/datauser', $data);
    }
    
    public function addUser()
    {
        $post = $this->input->post(null, true);
        $addUser = $this->user->addUser($post);
        if($addUser){
            $this->session->set_flashdata('success', 'Data User Berhasil Di Tambahkan');
            redirect('user');
        }else{
            $this->session->set_flashdata('failed', 'Data User Gagal Di Tambahkan');
            redirect('user');
        }
    }

    public function editUser()
    {
        $post = $this->input->post(null, true);
        $editUser = $this->user->editUser($post);
        if($editUser){
            $this->session->set_flashdata('success', 'Data User Berhasil Di Ubah');
            redirect('user');
        }else{
            $this->session->set_flashdata('failed', 'Data User Gagal Di Ubah');
            redirect('user');
        }
    }

    public function delUser($id = null)
    {
        if($id != null){
            $delUser = $this->user->delUser($id);
            if($delUser){
                $this->session->set_flashdata('success', 'Data User Berhasil Di Hapus');
                redirect('user');
            }else{
                $this->session->set_flashdata('failed', 'Data User Gagal Di Hapus');
                redirect('user');
            }
        }
    }
}
