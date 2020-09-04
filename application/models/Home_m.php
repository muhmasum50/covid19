<?php

use GuzzleHttp\Client;

class Home_m extends CI_Model {

    private $_client;

    public function __construct() {
        
        $this->_client =  new Client([
            'base_uri' => 'https://api.kawalcorona.com/'
        ]);
    }

    public function getDataPositifCovid() {

        $response = $this->_client->response('positif');
        $result = json_decode($response->getBody()->getContents(), true);

        return $result;
    }

    public function getDataSembuhCovid() {

        $response = $this->_client->response('sembuh');
        $result = json_decode($response->getBody()->getContents(), true);

        return $result;
    }

    public function getDataDeadCovid() {
        $response = $this->_client->response('meninggal');
        $result = json_decode($response->getBody()->getContents(), true);

        return $result;
    }

    public function getDataCaseIndCovid() {
        $response = $this->_client->response('indonesia');
        $result = json_decode($response->getBody()->getContents(), true);

        return $result;
    }

    public function getDataProvinsiCovid() {
        $response = $this->_client->response('indonesia/provinsi');
        $result = json_decode($response->getBody()->getContents(), true);

        return $result;
    }

    public function getDataGlobalCovid() {
        $response = $this->_client->response('');
        $result = json_decode($response->getBody()->getContents(), true);

        return $result;
    }
}