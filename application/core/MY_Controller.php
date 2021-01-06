<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function formatarData($data) {
        $str = explode('/', $data);
        return $str[2].'-'.$str[0].'-'.$str[1];
    }

}
