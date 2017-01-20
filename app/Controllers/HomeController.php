<?php

namespace App\Controllers;

class HomeController {
    private $view;
    
    function __construct() {
        $this->view = new \stdClass;
    }
    
    public function index() {
        $this->view->nome = "Jorgito da Silva Paiva";
        require_once __DIR__ . "/../Views/home/index.php";
    }
}
