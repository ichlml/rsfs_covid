<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent:: __construct();
		$this->load->model('m_dashboard', 'dash');
		check_not_login();
	}
	public function index()
	{
		$data = [
			'suspect' => $this->dash->countSuspect(),
			'confirm' => $this->dash->countConfirm(),
			'sembuh' => $this->dash->countSembuh(),
			'total' => $this->dash->countTotal(),
			
			'trlt4' => $this->dash->countTrlt4(),
			'kslt4' => $this->dash->countKslt4(),

			// lt5
			'trigd' => $this->dash->counttrigd(),
			'ksigd' => $this->dash->countksigd(),

			// lt1
			'trtb' => $this->dash->counttrtb(),
			'kstb' => $this->dash->countkstb(),

			'kstd' => $this->dash->countkstd(),
			'trtd' => $this->dash->counttrtd(),

			// TENDA
			// 'tndp' => $this->dash->tndp(),
			// 'tndl' => $this->dash->tndl()

		];

		// print_r($data['trlt4']);
		// exit;
		$this->template->load('dashboard', 'admin/dash', $data);
	}
}
