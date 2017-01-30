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

    public function salvar(array $data) {
        $dados = $this->prepareDataInsert($data);
        $query = "INSERT INTO {$this->table} ({$dados[0]}) VALUE ({$dados[1]})";
        $stmt = $this->pdo->prepare($query);
        for ($index = 0; $index < count($dados[2]); $index++) {
            $stmt->bindValue("{$dados[2][$index]}", $dados[3][$index]);
        }
        $result = $stmt->execute();
        $stmt->closeCursor();
        return $result;
    }

    private function prepareDataInsert(array $data) {
        $strKeys = "";
        $strBinds = "";
        $binds = [];
        $values = [];
        foreach ($data as $key => $value) {
            $strKeys = "{$strKeys},{$key}";
            $strBinds = "{$strBinds},:{$key}";
            $binds[] = ":{$key}";
            $values[] = $value;
        }
        $strKeys = substr($strKeys, 1);
        $strBinds = substr($strBinds, 1);
        return [$strKeys, $strBinds, $binds, $values];
    }
    
    public function update(array $dados, $id) {
        $data = $this->prepareDataUpdate($dados);
        $query = "UPDATE {$this->table} SET {$data[0]} WHERE id=:id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindValue(":id", $id);
        for ($i = 0; $i < count($data[1]); $i++) {
            $stmt->bindValue("{$data[1][$i]}", $data[2][$i]);
        }
        $result = $stmt->execute();
        return $result;
    }

    private function prepareDataUpdate(array $data) {
        $strKeysBinds = "";
        $binds = [];
        $values = [];
        foreach ($data as $key => $value) {
            $strKeysBinds = "{$strKeysBinds}, {$key}=:{$key}";
            $binds[] = ":{$key}";
            $values[] = $value;
        }
        $strKeysBinds = substr($strKeysBinds, 1);
        return [$strKeysBinds, $binds, $values];
    }
    
}