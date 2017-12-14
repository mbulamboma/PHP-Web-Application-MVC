<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Application\Frontend\Register;
use \Framework\Controller;
use \Entity\Member;
use \Config\Config;
/**
 * Description of PostsController
 *
 * @author mbula
 */
class RegisterController extends Controller {
    public function __construct() {
        parent::__construct();
        $this->oMembers = new Member;
        $this->oManager = new \Model\MembersManagerPDO;
    }
    //Front-end Application 
    //Login Form page with Ajax
    public function index(){
        if(!$this->oUser->isAuthenticated()){
        $this->oBack->emptyView('Register', 'index'); 
        } else {
            header('location: index.php');
        }
    }
    public function step2(){
        if(!$this->oUser->isAuthenticated()){
        $this->oBack->emptyView('Register', 'step2'); 
        } else {
            header('location: index.php');
        }
    }
    public function step3(){
        if(!$this->oUser->isAuthenticated()){
        $this->oBack->emptyView('Register', 'step3'); 
        } else {
            header('location: index.php');
        }
    }
    //Asynchrone Actions
    //check if email is free
    public function freemail() {
        $email = htmlspecialchars(!empty($_POST['email']) ? $_POST['email'] : 'user@gmail.com');
        $aArray =['email' => $email];
        $this->oMembers->hydrate($aArray);
        $bTest = $this->oManager->isFreeEmail($this->oMembers->getEmail());
        echo json_encode(!$bTest);
    }
    //send form step 1
    public function reg() {
        
        $aArray = [
            'firstname' => htmlspecialchars(!empty($_POST['firstname']) ? $_POST['firstname'] : 'mbula'),
            'lastname' => htmlspecialchars(!empty($_POST['lastname']) ? $_POST['lastname'] : 'mboma'),
            'email' => htmlspecialchars(!empty($_POST['email']) ? $_POST['email'] : 'user@gmail.com'),
            'password' => htmlspecialchars(!empty($_POST['password']) ? $_POST['password'] : '123456'),
        ];
        $this->oMembers->hydrate($aArray);
        $nbOfArrayErrors =(int) count( $this->oMembers->InputErrors());
         if($this->oMembers->isValidinputs() && $nbOfArrayErrors == 0){
             $this->oManager->registerStep1($this->oMembers);
             echo json_encode(TRUE);
         }
         else{ echo json_encode(FALSE);}
    }
}

