<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->model('home_m');
	}

	public function index()
	{
		$data = [
			'title' => 'Covid 19 - Coronavirus Global & Indonesia Live',
			'positif' => $this->home_m->getDataPositifCovid(),
			'sembuh'=> $this->home_m->getDataSembuhCovid(),
			'meninggal' => $this->home_m->getDataDeadCovid(),
			'ina' => $this->home_m->getDataCaseIndCovid(),
			'provinsi' => $this->home_m->getDataProvinsiCovid(),
			'global' => $this->home_m->getDataGlobalCovid()
		];
		$this->template->load('template_frontend/template_v','home/dashboard_frontend', $data);
	}
}
