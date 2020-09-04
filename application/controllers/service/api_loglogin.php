<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Api_loglogin extends REST_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->model('log_m');

        $this->methods['index_get']['limit'] = 50;

    }

    public function index_get() {
        $log = $this->log_m->getApi();

        if($log) {
            $this->response([
                'status' => true,
                'data' => $log,
            ], REST_Controller::HTTP_OK);
        }
    }

}