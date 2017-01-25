<?php

namespace App\Models;

use Core\BaseModel;

class Usuario extends BaseModel {
    protected $table = "tb_usuario";
    private $nomeCompleto;
    private $email;
    private $senha;
    
    function getNomeCompleto() {
        return $this->nomeCompleto;
    }

    function getEmail() {
        return $this->email;
    }

    function getSenha() {
        return $this->senha;
    }

    function setNomeCompleto($nomeCompleto) {
        $this->nomeCompleto = $nomeCompleto;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }


}
