<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Framework;
use \Framework\BackController;
use \Framework\HTTPRequest;
use \Framework\HTTPResponse;
use \Framework\User;
/**
 * Description of Controller
 *
 * @author mbula
 */
class Controller {
    protected $oBack, $oModel, $oUser, $oHttprequest, $oHttpresponse, $oManager, $oComments;
    protected $oPosts, $oMessages, $oPictures, $_iId, $_step;
    public $oMembers;

    public function __construct()
    {
        // Enable PHP Session
        if (empty($_SESSION))
            @session_start();
        $this->oBack = new BackController;
        $this->oUser = new User;
        $this->oHttprequest = new HTTPRequest;
        $this->oHttprequest = new HTTPResponse();
        /** Get the Post ID in the constructor in order to avoid the duplication of the same code **/
        $this->_iId = (int) (!empty($_GET['id']) ? $_GET['id'] : 0);
        $this->_step = (int) (!empty($_GET['s']) ? $_GET['s'] : 1);
    }
    public function notFound() {
        $this->oBack->getErrorFile('404');
    }
}
