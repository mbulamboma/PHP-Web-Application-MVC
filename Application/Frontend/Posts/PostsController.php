<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Application\Frontend\Posts;
use \Framework\Controller;
/**
 * Description of PostsController
 *
 * @author mbula
 */
class PostsController extends Controller {
    public function __construct() {
        parent::__construct();
    }
    //Front-end Index of Articles
    public function index() {
        $this->oBack->getView('Posts', 'index');     
    }
    public function read() {
        $this->oBack->getView('Posts', 'read');  
    }
}
