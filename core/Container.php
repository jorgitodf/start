<?php

namespace Core;

class Container {
    
    public static function newController($controller) {
        $objController = "App\\Controllers\\" . $controller;
        return new $objController;
    }
    
    public static function getModel($model) {
        $objModel = "App\\Models\\" . $model;
        return new $objModel(DataBase::getDataBase());
    }
    
    public static function pageNotFound() {
        if (file_exists(__DIR__ . "/../app/Views/404.php")) {
            return require_once __DIR__ . "/../app/Views/404.php";
        } else {
            echo "<h1>Erro 404: O Arquivo da Page Not Found</h1>";
        }
    }
}
