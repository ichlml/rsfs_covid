<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller { 

    public function __construct()
    {
        parent :: __construct();
        $this->load->model('m_dashboard', 'dash');
        check_not_login();
    }

    public function lt4()
    {

        $dataLt4 = $this->dash->dashLt4()->result();

        $bed = $this->dash->bedRuang()->result();

        $data = [
            'row' => $dataLt4,
            'bed' => $bed,
            'pasien' => $this->dash->dataPasien()->result()
        ];
        


        $this->template->load('dashboard', 'admin/lt4/lt4', $data);
    }

    public function lt5()
    {

        $dataLt5 = $this->dash->dashLt5()->result();

        $bed = $this->dash->bedRuang()->result();

        $data = [
            'row' => $dataLt5,
            'bed' => $bed,
            'pasien' => $this->dash->dataPasien()->result()
        ];
        


        $this->template->load('dashboard', 'admin/lt5/lt5', $data);
    }

    public function igd()
    {
        $igd = $this->dash->igd()->result();
        

        $data = [
            'row' => $igd,
            'bed' => $this->dash->bedRuang()->result(),
            'pasien' => $this->dash->dataPasien()->result()
        ];

        $this->template->load('dashboard', 'admin/igd/igd', $data);
    }

    public function td()
    {
        $td = $this->dash->td()->result();
        $data = [
            'row' => $td,
            'bed' => $this->dash->bedRuang()->result(),
            'pasien' => $this->dash->dataPasien()->result()
        ];

        $this->template->load('dashboard', 'admin/td/td', $data);
    }

    public function tbd()
    {
        $tbd = $this->dash->tbd()->result();
        $data = [
            'row' => $tbd,
            'bed' => $this->dash->bedRuang()->result(),
            
            'pasien' => $this->dash->dataPasien()->result()
        ];

        $this->template->load('dashboard', 'admin/tbd/tbd', $data);
    }

    public function kosong()
    {
        $dataLt4 = $this->dash->kosong()->result();

        $bed = $this->dash->bedRuang()->result();

        $data = [
            'row' => $dataLt4,
            'bed' => $bed,
            'pasien' => $this->dash->dataPasien()->result()
        ];
        


        $this->template->load('dashboard', 'admin/kosong/kosong', $data);
    }

    public function rekapbed()
    {
        $data = [
            'GroupBed' => $this->dash->GroupBed()->result(),
            'ResBed' => $this->dash->ResBed()->result()
        ];

        $this->template->load('dashboard', 'admin/rekap/rekap', $data);
    }
    
}