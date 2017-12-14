<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Application\Frontend\Errors;
use \Framework\Controller;
/**
 * Description of PostsController
 *
 * @author mbula
 */
class ErrorsController extends Controller {
    public function __construct() {
        parent::__construct();
    }
    //Front-end Index of Articles
    public function notSeen() {
        $this->oBack->getView('Errors', '404');     
    }
}
