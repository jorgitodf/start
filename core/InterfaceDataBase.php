<?php

namespace Core;

interface InterfaceDataBase {
    public function getAll();
    public function salvar(array $data);
    public function atualizar();
}
