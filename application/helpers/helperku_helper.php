<?php

function check_already_login()
{
    $ci =& get_instance();
    $user_session = $ci->session->userdata('id');
    if($user_session)
    {
        redirect('www/dashboard');
    }
}

function check_not_login()
{
    $ci =& get_instance();
    $user_session = $ci->session->userdata('id');
    if(!$user_session)
    {
        redirect('www/auth/login');
    }
}

function check_role_user()
{
    $ci =& get_instance();
    $ci->load->library('libraryku');

    if($ci->libraryku->getData()->role_id != '2'){
        redirect('www/dashboard');
    }
}

function check_role_admin() {
    $ci =& get_instance();
    $ci->load->library('libraryku');

    if($ci->libraryku->getData()->role_id != '1'){
        redirect('www/dashboard');
    }
}

function debug($var, $die=FALSE)
{
	echo '<pre>';
	print_r($var);
	echo '</pre>';
	if ($die) die;
}

function matauang_indo($nominal) {
    $result = "Rp. " . number_format($nominal, 2, ','. ',');
    return $result;
}

function tanggal_indo($date) {
    $d = substr($date,8,2);
    $m = substr($date,5,2);
    $y = substr($date,0,4);

    return $d.'/'.$m.'/'.$y;
}

function GenerateToken($strength = 16) {

    $input = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    $input_length = strlen($input);
    $random_string = '';
    for($i = 0; $i < $strength; $i++) {
        $random_character = $input[mt_rand(0, $input_length - 1)];
        $random_string .= $random_character;
    }
 
    return $random_string;
}
