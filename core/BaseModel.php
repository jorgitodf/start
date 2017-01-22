<?php

namespace Core;

use PDO;
use Core\InterfaceDataBase;

abstract class BaseModel implements InterfaceDataBase {
    
    private $pdo;
    protected $table;
    
    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }
    
    public function getAll() {
        $query = "SELECT * FROM {$this->table}";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll();
        $stmt->closeCursor();
        return $result;
    }
    
    public function atualizar() {
        
    }

    public function salvar() {
        
    }


}