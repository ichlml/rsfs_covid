<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pasien extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_pasien','pasien');
        check_not_login();
    }

    public function getPasien()
    {
        $data = [
            'dataPasien' => $this->pasien->getPasien()->result(),
            'dataConfirm' => $this->pasien->getConfirm()->result(),
            'dataSembuh' => $this->pasien->getSembuh()->result(),
            'dataRuang' => $this->pasien->getRuang()->result(),
            'rsu' => $this->pasien->getRsu()->result()
        ];
        // var_dump($data);
        // exit;
        $this->template->load('dashboard', 'admin/pasien/dataPasien', $data);
    }

    public function pasien_rajal()
    {
        $data = [
            'pasienrajal' => $this->pasien->rajal()->result()
        ];

        $this->template->load('dashboard', 'admin/pasien/datarajal', $data);
    }

    public function getNoRm()
    {
        if(isset($_GET['term'])){
            $keyword = $this->pasien->getNoRm($_GET['term']);
            if(count($keyword)>0){
                foreach($keyword as $key)
                $arr_key[] = $key['no_rkm_medis']; 
                echo json_encode($arr_key);
            }
            // var_dump($data);
            // die;
        }
    }

    public function getDataPasien()
    {
        $key = $this->input->post('no_rkm_medis');
        $result = $this->pasien->getDataPasien($key);
        echo json_encode($result)   ;
    }

    public function addPasien()
    {
        $post = $this->input->post(null, true);
        $no_rkm_mds = $this->input->post('no_rkm_medis');

        // print_r($post);
        // exit;
        if($post['nm_pasien'] == ''){
            $this->session->set_flashdata('failed', 'Data Pasien Tidak Di Temukan');
            redirect('pasien/getPasien');
        }else{
            

            $cekAkses = $this->pasien->cekAkses();
            $row = $cekAkses->row();
            if($row->status_akses == '0'){
                $cek = $this->pasien->cekPasien($no_rkm_mds);
                if($cek->num_rows() == 0){
                    $id = $this->input->post('id_bed');
                    $addPasien = $this->pasien->addPasien($post);
                    if($addPasien){
                        if($post['status_pasien'] == 'suspect' OR $post['status_pasien'] == 'confirm'){
                            $this->pasien->updBed($id);
                            $this->pasien->updKamarAP($post);
                            $this->session->set_flashdata('success', 'Data Pasien Berhasil Di Tambahkan');
                        redirect('pasien/getPasien');
                        }elseif($post['status_pasien'] == 'probable'){
                            $this->session->set_flashdata('success', 'Data Pasien Berhasil Di Tambahkan');
                            redirect('pasien/getPasien');
                        }
                    }else{
                        $this->session->set_flashdata('failed', 'Data Pasien Gagal Di Tambahkan');
                        redirect('pasien/getPasien');
                    }
                }else{
                    $this->session->set_flashdata('avaible', 'Data Pasien Sudah Ada');
                        redirect('pasien/getPasien');
                }
            }elseif ($row->status_akses == '1') {
                $cek = $this->pasien->cekPasien($no_rkm_mds);
                if($cek->num_rows() == 0){
                    $id = $this->input->post('id_bed');
                    $addPasien = $this->pasien->addPasien($post);
                    if($addPasien){
                        if($post['status_pasien'] == 'suspect' OR $post['status_pasien'] == 'confirm'){
                            $this->pasien->updBed($id);
                            $this->session->set_flashdata('success', 'Data Pasien Berhasil Di Tambahkan');
                        redirect('pasien/getPasien');
                        }elseif($post['status_pasien'] == 'probable'){
                            $this->session->set_flashdata('success', 'Data Pasien Berhasil Di Tambahkan');
                            redirect('pasien/getPasien');
                        }
                    }else{
                        $this->session->set_flashdata('failed', 'Data Pasien Gagal Di Tambahkan');
                        redirect('pasien/getPasien');
                    }
                }else{
                    $this->session->set_flashdata('avaible', 'Data Pasien Sudah Ada');
                        redirect('pasien/getPasien');
                }
            }

            
        }
        
    }

    // chained dropdown
    public function getKamar()
    {
        $cekAkses = $this->pasien->cekAkses();
        $row = $cekAkses->row();
        if($row->status_akses == '0'){
            $id = $this->input->post('id');
            $jk = $this->input->post('jk');
            $data = $this->pasien->chainedKamar($id, $jk);
            echo json_encode($data);
        }elseif ($row->status_akses == '1') {
            $data = $this->pasien->AksKamar()->result();
            echo json_encode($data);
        }
    }

    public function getBed()
    {
        $id_kamar = $this->input->post('id_kamar');
        $data = $this->pasien->chainedBed($id_kamar);
        echo json_encode($data);
    }
    // end chained

    public function upPasien()
    {
        $post = $this->input->post(null, true);
        $id = $this->input->post('idbed');
        $tgl_a = date_create($this->input->post('tgl_masuk'));
        $tgl_b = date_create($this->input->post('tgl_confirm'));

        $diff = date_diff($tgl_a, $tgl_b);
        $i = $diff->i;
        $h = $diff->h;
        // confirm
        // print_r($post);
        // exit;                                  
        if($post['status_pasien'] == 'confirm'){  
            $upConfirm = $this->pasien->upConfirm($post, $i, $h);
            
            if($upConfirm ){
                if($post['status_plg'] != ''){
                    $id = $this->input->post('idbed');
                    $this->pasien->upd($id);

                    $cekK = $this->pasien->cekKamarKosong($id);
                    $row = $cekK->row();
                    $id_kamar = $row->id_kamar;
                    if($cekK->num_rows() == '1'){
                        $this->pasien->upStatusKamar($id_kamar);
                    }
                }
                
                $this->session->set_flashdata('success', 'Data Pasien Berhasil Di Update');
                redirect('pasien/getPasien');
            }else{
                $this->session->set_flashdata('failed', 'Data Pasien Gagal Di Update');
                redirect('pasien/getPasien');
            }
            // pulang
        }elseif($post['status_pasien'] == 'suspect'){
            $upSuspect = $this->pasien->upPsuspect($post, $h, $i);
            if($upSuspect){
                $this->pasien->upd($id);
                    $cekK = $this->pasien->cekKamarKosong($id);
                    $row = $cekK->row();
                    $id_kamar = $row->id_kamar;
                    if($cekK->num_rows() == '1'){
                        $this->pasien->upStatusKamar($id_kamar);
                    }
                $this->session->set_flashdata('success', 'Data Pasien Berhasil Di Update');
                redirect('pasien/getPasien');
            }else{
                $this->session->set_flashdata('failed', 'Data Pasien Gagal Di Update');
                redirect('pasien/getPasien');
            }
            // discarded
        }elseif ($post['status_pasien'] == 'discarded') {
            $upDiscarded = $this->pasien->updis($post, $h, $i);
            // print_r($post);
            // exit;
            if($upDiscarded){
                $this->pasien->upd($id);
                    $cekK = $this->pasien->cekKamarKosong($id);
                    $row = $cekK->row();
                    $id_kamar = $row->id_kamar;
                    if($cekK->num_rows() == '1'){
                        $this->pasien->upStatusKamar($id_kamar);
                    }
                $this->session->set_flashdata('success', 'Data Pasien Berhasil Di Update');
                redirect('pasien/getPasien');
            }else{
                $this->session->set_flashdata('failed', 'Data Pasien Gagal Di Update');
                redirect('pasien/getPasien');
            }
            // inkonklusif
        }elseif($post['status_pasien'] == 'inkonklusif'){
            $upInkon = $this->pasien->upInkon($post, $h, $i);
            
            if($upInkon){
                $this->pasien->upd($id);
                    $cekK = $this->pasien->cekKamarKosong($id);
                    $row = $cekK->row();
                    $id_kamar = $row->id_kamar;
                    if($cekK->num_rows() == '1'){
                        $this->pasien->upStatusKamar($id_kamar);
                    }
                $this->session->set_flashdata('success', 'Data Pasien Berhasil Di Update');
                redirect('pasien/getPasien');
            }else{
                $this->session->set_flashdata('failed', 'Data Pasien Gagal Di Update');
                redirect('pasien/getPasien');
            }
        }
    }


    public function upPasienRajal()
    {
        $post = $this->input->post(null, true);
                                       
        if($post['status_pasien'] == 'confirm'){  
            $upConfirm = $this->pasien->upConfirm($post);
            
            if($upConfirm ){
                $this->session->set_flashdata('success', 'Data Pasien Berhasil Di Update');
                redirect('pasien/pasien_rajal');
            }else{
                $this->session->set_flashdata('failed', 'Data Pasien Gagal Di Update');
                redirect('pasien/pasien_rajal');
            }
            // pulang
        }elseif($post['status_pasien'] == 'suspect'){
            $upSuspect = $this->pasien->upPsuspect($post);
            if($upSuspect){
                $this->session->set_flashdata('success', 'Data Pasien Berhasil Di Update');
                redirect('pasien/pasien_rajal');
            }else{
                $this->session->set_flashdata('failed', 'Data Pasien Gagal Di Update');
                redirect('pasien/pasien_rajal');
            }
            // discarded
        }elseif ($post['status_pasien'] == 'discarded') {
            $upDiscarded = $this->pasien->updis($post);
            // print_r($post);
            // exit;
            if($upDiscarded){
                $this->session->set_flashdata('success', 'Data Pasien Berhasil Di Update');
                redirect('pasien/pasien_rajal');
            }else{
                $this->session->set_flashdata('failed', 'Data Pasien Gagal Di Update');
                redirect('pasien/pasien_rajal');
            }
            // inkonklusif
        }elseif($post['status_pasien'] == 'inkonklusif'){
            $upInkon = $this->pasien->upInkon($post);
            
            if($upInkon){
                $this->session->set_flashdata('success', 'Data Pasien Berhasil Di Update');
                redirect('pasien/pasien_rajal');
            }else{
                $this->session->set_flashdata('failed', 'Data Pasien Gagal Di Update');
                redirect('pasien/pasien_rajal');
            }
        }
    }


    public function pindahKamar()
    {
        $post = $this->input->post(null, true);
        $id = $this->input->post('id_bed_lama');
        // print_r($post);
        // exit;
        $updKamar = $this->pasien->updKamar($post);
        if($updKamar){
            $this->pasien->upd($id);
            $this->pasien->updKamarAPrajal($post);
            $cekK = $this->pasien->cekKamarKosong($id);
            $row = $cekK->row();
            $id_kamar = $row->id_kamar;
            if($cekK->num_rows() == '1'){
                $this->pasien->upStatusKamar($id_kamar);
            }
            $this->session->set_flashdata('success', 'Data Pasien Berhasil Di Pindah');
            redirect('pasien/getPasien');
        }else{
            $this->session->set_flashdata('failed', 'Data Pasien Gagal Di Pindah');
            redirect('pasien/getPasien');
        }
    }
    public function pindahKamarRajal()
    {
        $post = $this->input->post(null, true);
        $updKamar = $this->pasien->updKamar($post);
        if($updKamar){
            $this->pasien->updKamarAPra($post);
            $this->session->set_flashdata('success', 'Data Pasien Berhasil Di Pindah');
            redirect('pasien/pasien_rajal');
        }else{
            $this->session->set_flashdata('failed', 'Data Pasien Gagal Di Pindah');
            redirect('pasien/pasien_rajal');
        }
    }
   
    public function addPasienRajal()
    {
       $post = $this->input->post();
       $no_rkm_mds = $this->input->post('no_rkm_medis');
       $add = $this->pasien->addrajal($post);

        // print_r($post);
        // exit;
        if($post['nm_pasien'] == ''){
            $this->session->set_flashdata('failed', 'Data Pasien Tidak Di Temukan');
            redirect('pasien/getPasien');
        }else{
            if($add){
                
                $this->session->set_flashdata('success', 'Data Pasien Berhasil Di Tambah');
                redirect('pasien/pasien_rajal');
            }else{
                $this->session->set_flashdata('failed', 'Data Pasien Gagal Di Tambah');
                redirect('pasien/pasien_rajal');
            }
    }
    }

    public function renswab()
    {
        $data = [
            'rencswab' => $this->pasien->rencswab()->result()
        ];

        $this->template->load('dashboard', 'admin/rencswab/data', $data);
    }

    public function getPasiencvd()
    {
        if(isset($_GET['term'])){
            $keyword = $this->pasien->getPasiencvd($_GET['term']);
            if(count($keyword)>0){
                foreach($keyword as $key)
                $arr_key[] = $key['no_rkm_medis']; 
                echo json_encode($arr_key);
            }
        }
    }

    public function getDataPasiencvd()
    {
        $key = $this->input->post('no_rkm_medis');
        $result = $this->pasien->getDataPasiencvd($key);
        echo json_encode($result)   ;
    }

    public function addrenswab()
    {
        $post = $this->input->post(null, true);
        $adren = $this->pasien->addRen($post);
        if($adren){
                
            $this->session->set_flashdata('success', 'Data Pasien Berhasil Di Tambah');
            redirect('pasien/renswab');
        }else{
            $this->session->set_flashdata('failed', 'Data Pasien Gagal Di Tambah');
            redirect('pasien/renswab');
        }
    }

}