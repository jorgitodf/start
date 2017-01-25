<?php

namespace App;

interface IDataBaseInfo {
    const DRIVER = "mysql";
    const HOST = "localhost";
    const DBNAME = "teste";
    const UNAME = "root";
    const PASSW = "camelo69";
    const CHARSET = "utf8";
    const COLLATION = "utf8_unicode_ci";
    public static function getDataBase();
}
