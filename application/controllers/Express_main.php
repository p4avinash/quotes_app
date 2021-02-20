<?php

class Express_main extends CI_Controller
{

    // constructor
    function __construct()
    {
        parent::__construct();
    }


    public function index()
    {
        $this->load->view('express_main');
    }
}
