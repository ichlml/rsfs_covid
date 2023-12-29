<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BedCovid extends CI_Controller {

    public function __construct()
    {
        parent :: __construct();
        $this->load->model('m_dashboard', 'dash');
    }

    public function index()
    {
        $data = [
            'GroupBed' => $this->dash->GroupBed()->result(),
            'ResBed' => $this->dash->ResBed()->result()
        ];

        $this->load->view('bedcovid', $data);
    }
}