<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_laporan', 'lap');
        check_not_login();
    }

    public function index()
    {
        $this->template->load('dashboard', 'admin/lap/datalap');
    }

    public function lapBulan()
    {

        $post = $this->input->post(null, true);
        // print_r($post);
        // exit;
        $data = [
            'lapResult' => $this->lap->getLap($post)->result(),
            'lapRow' => $this->lap->getLap($post)->row(),
            'tglA' => $this->input->post('tglA'),
            'tglB' => $this->input->post('tglB'),
            'stts' => $this->input->post('status_pasien'),
            // konfirm
            'totKonfirm' => $this->lap->getLap($post),
            'konRawat' => $this->lap->konRawat($post),
            'konbp' => $this->lap->konbp($post),
            'konmgl' => $this->lap->konmgl($post),
            'konrjk' => $this->lap->konrjk($post),
            'isoman' => $this->lap->isoman($post),
            'noniso' => $this->lap->noniso($post),
            'karantina' => $this->lap->karantina($post),
            'konaps' => $this->lap->konaps($post),
            //discarded
            'totdis' => $this->lap->totdis($post),
            'disbp' => $this->lap->disbp($post),
            'dismgl' => $this->lap->dismgl($post),
            'disrjk' => $this->lap->disrjk($post),
            'disisoman' => $this->lap->disisoman($post),
            'disaps' => $this->lap->disaps($post),
            'disin' => $this->lap->disin($post),
            
            //inkonklusif
            'totin' => $this->lap->totin($post),
            'insmgl' => $this->lap->insmgl($post),
            'inaps' => $this->lap->inaps($post),

            //suspext
            'totsus' => $this->lap->totsus($post),
            'sustdy' => $this->lap->sustdy($post),
            'susrajal' => $this->lap->susrajal($post),
            'susranap' => $this->lap->susranap($post),
            'susrjk' => $this->lap->susrjk($post),
            'susaps' => $this->lap->susaps($post),
            'susisoman' => $this->lap->susisoman($post),

        ];

        // if($post['status_pasien'] == '' AND $post['jk'] == '' AND $post['status_pasien'])
        // echo '<pre>';
        // print_r($data['totin']);
        // die();
    
        $this->load->library('pdf');
    
        $this->pdf->setPaper('A4', 'landscape');
        $this->pdf->filename = "Laporan Pasien Covid Tanggal ". $post['tglA'] ." Sampai ". $post['tglB'] .".pdf";
        $this->pdf->load_view('admin/lap/lap', $data);
    }

    public function hari ()
    {
        $this->template->load('dashboard', 'admin/lap/laphari');
    }

    public function ctHari()
    {
        $post = $this->input->post(null, true);
        $tgl = $this->input->post('tgl_masuk');
        $tgl_B = date("$tgl 23:59:59");
        $n = date("$tgl 00:00:00");
        $tgl_A = date("2020-05-01 00:00:00");
        // print_r($post);
        // exit;
        $data = [
            'tgl' => $tgl,
            'bag' => $this->input->post('bagian'),
            'data' => $this->lap->laplt1($post)->result(),
            'bed' => $this->lap->bed($post)->result(),
            'p' => $this->lap->pasien($post, $tgl_A, $tgl_B)->result(),
            'kapsigs' => $this->lap->kapsigs()->row(),
            'kapstbd' => $this->lap->kapstbd()->row(),
            'tbd' => $this->lap->tbd()->row(),
            // lt4
            'pbaru' => $this->lap->pbaru($post, $tgl_B, $n),
            'lt4rjx' => $this->lap->lt4rjx($post, $tgl_B, $n),
            'lt4aps' => $this->lap->lt4aps($post, $tgl_B, $n),
            'lt4mng' => $this->lap->lt4mng($post, $tgl_B, $n),
            'lt4blpc' => $this->lap->lt4blpc($post, $tgl_B, $n),
            'lt4SWAB' => $this->lap->lt4SWAB($post, $tgl_B, $n),
            'lt4thx' => $this->lap->lt4thx($post, $tgl_B, $n),
            'bedlt4' => $this->lap->bedlt4($post, $tgl_B, $n)->result(),
            'totlt4' => $this->lap->totlt4($post, $tgl_B, $n)->row(),
            'sisalt4' => $this->lap->sisalt4($post, $tgl_B, $n)->row(),
            'lt4isoman' => $this->lap->lt4isoman($post, $tgl_B, $n)
            // lt5

        ];

        // print_r($data['lt4isoman']->result());
        // exit;
        $this->load->library('pdf');
    
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "Laporan Pasien Covid Bagian ". $post['bagian'] ." Tanggal ". $post['tgl_masuk'] .".pdf";
        $this->pdf->load_view('admin/lap/ctkHari', $data);
    }
}