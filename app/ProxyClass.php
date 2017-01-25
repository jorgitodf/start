<?php

namespace App;

abstract class ProxyClass {
    
    public static function verificaCamposVazios($email) {
        if (empty($email) || $email = "") {
            echo "Preencha o Campo do E-mail";
        }
        return false;
    }
    
}
