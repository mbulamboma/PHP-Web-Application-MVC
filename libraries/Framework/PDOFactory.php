<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Framework;
use \Config\Config;
/**
 * Description of PDOFactory
 *
 * @author mbula
 */
class PDOFactory extends \PDO{
    public function __construct()
    {
        $aDriverOptions[\PDO::MYSQL_ATTR_INIT_COMMAND] = 'SET NAMES UTF8';
        parent::__construct('mysql:host=' . Config::DB_HOST . ';dbname=' . Config::DB_NAME . ';', Config::DB_USR, Config::DB_PWD, $aDriverOptions);
        $this->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }
}
