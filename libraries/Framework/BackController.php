<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Framework;

/**
 * Description of BackController
 *
 * @author mbula
 */
class BackController {
    public function emptyView($module, $view)
    {
        $sFullPath = ROOT_PATH . 'Application/Frontend/'.$module.'/views/'.$view.'.php';
        $this->includeIfExist($sFullPath);
    }
    
    public function getView($module, $view)
    {
        ob_start();
        $sFullPath = ROOT_PATH . 'Application/Frontend/'.$module.'/views/'.$view.'.php';
        $this->includeIfExist($sFullPath);
        $content= ob_get_clean();
        require_once ROOT_PATH . 'Application/Template/template.php';;
    }

    public function getManagerOf($manager)
    {
        $sFullPath = ROOT_PATH . 'libraries/vendors/Model/'.$manager.'ManagerPDO.php';
        $this->includeIfExist($sFullPath);
    }

    public function getErrorFile($error) {
        $sFullPath = ROOT_PATH . 'Application/Errors/'.$error.'.php';
        require $sFullPath;
    }
    private function includeIfExist($sFullPath) {
        if (is_file($sFullPath)){ require $sFullPath;}
        else{ exit('The "' . $sFullPath . '" file doesn\'t exist');}
    }

    /**
     * Set variables for the template views.
     *
     * @return void
     */
    public function __set($sKey, $mVal)
    {
        $this->$sKey = $mVal;
    }

}
