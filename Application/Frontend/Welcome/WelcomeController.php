<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Application\Frontend\Welcome;
use \Framework\Controller;
/**
 * Description of PostsController
 *
 * @author mbula
 */
class WelcomeController extends Controller {
    public function __construct() {
        parent::__construct();
    }
    //Front-end Index of Articles
    public function index() {
        $this->oBack->getView('Welcome', 'index');     
    }
    public function contact() {
        $this->oBack->getView('Welcome', 'contact');  
    }
    public function about() {
        $this->oBack->getView('Welcome', 'about');  
    }
}
