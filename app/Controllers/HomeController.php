<?php

namespace App\Controllers;

use Core\BaseController;
use Core\Container;

class HomeController extends BaseController {
    
    private $modelUsuario;
    
    public function __construct() {
        parent::__construct();
        $this->modelUsuario = Container::getModel("Usuario");
    }
    
    public function index($request) {
        $this->setPageTitle('Home');
        $this->renderView('home/index', 'layout');
    
    }
}
