<?php

namespace Core;

use PDO;
use PDOException;

class DataBase {
    
    public static function getDataBase() {
        $conf = include_once __DIR__ . "/../app/database.php";
        if ($conf['driver'] = 'mysql') {
            $host = $conf['mysql']['host'];
            $db = $conf['mysql']['database'];
            $user = $conf['mysql']['user'];
            $pass = $conf['mysql']['pass'];
            $charset = $conf['mysql']['charset'];
            $collation = $conf['mysql']['collation'];
            try {
                $pdo = new PDO("mysql:dbname=$db;host=$host;charset=$charset", $user, $pass);
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $pdo->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES '$charset' COLLATE '$collation'");
                    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);       
                return $pdo;
            } catch (PDOException $exc) {
                if ($exc->getCode() == 1049) {
                    echo "<h3>O Banco de Dados <b>test</b> não Existe... </h3><br/>";
                } elseif ($exc->getCode() == 1045) {
                    echo "<h3>O Usuário ou a Senha do Banco de Dados não Confere(m)...</h3><br/>";
                }
                echo $exc->getMessage();    
            } 
        }
    }

}