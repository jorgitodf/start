<?php

namespace Core;

abstract class BaseController {
    
    protected $view;
    private $viewPath;
    private $layoutPath;
    private $pageTitle = null;
    
    public function __construct() {
        $this->view = new \stdClass;
    }
    
    protected function renderView($viewPath, $layoutPath = null) {
        $this->viewPath = $viewPath;
        $this->layoutPath = $layoutPath;
        if ($layoutPath) {
            $this->layout();
        } else {
            $this->content();
        }
    }

    protected function content() {
        if (file_exists(__DIR__ . "/../app/Views/{$this->viewPath}.php")) {
	    require_once __DIR__ . "/../app/Views/{$this->viewPath}.php";	
	} else {
	    echo "Erro: O caminho para a View não existe";
	}
    }
    
    protected function layout() {
        if (file_exists(__DIR__ . "/../app/Views/{$this->layoutPath}.php")) {
	    require_once __DIR__ . "/../app/Views/{$this->layoutPath}.php";	
	} else {
	    echo "Erro: O caminho para o Layout não existe";
	}
    }
    
    protected function setPageTitle($pageTitle) {
        $this->pageTitle = $pageTitle;
    }
    
    protected function getPageTitle($separator = null) {
        if ($separator) {
            echo $this->pageTitle . " " . $separator . " ";
        } else {
            echo $this->pageTitle;
        }
    }
}
