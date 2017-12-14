<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Framework;
use \Framework\PDOFactory;
use Config\Config;

/**
 * Description of Manager
 *
 * @author mbula
 */
class Manager {
    protected $oDb, $cTri, $cSort, $nbOfMemberSort;
    public function __construct()
    {
        //We instanciate the PDO object
        $this->oDb = new PDOFactory;
        
        //get the Tri and Sort value
        $getTri = (!empty($_GET['tri'])  ? $_GET['tri'] : 0);
        $getSort =(!empty($_GET['sort'])  ? $_GET['sort'] : 0);
        
        //count Numbers of Sort
        $this->nbOfMemberSort = (int) count(Config::aMEMBER_SORT_BY);
        
        //We verify wether the sort and tri respect the rules
        if(!is_numeric($getSort) || ($getSort > ($this->nbOfMemberSort-1))){ $this->cSort = 0; }
        else { $this->cSort = (int)$getSort; }
        if(!is_numeric($getTri) || ($getTri > 1)){ $this->cTri = 0; }
        else { $this->cTri = (int)$getTri; } 
    }
}
