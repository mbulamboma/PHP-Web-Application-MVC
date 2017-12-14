<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Application\Frontend\Login;
use \Framework\Controller;
use \Entity\Member;
use \Config\Config;
/**
 * Description of PostsController
 *
 * @author mbula
 */
class LoginController extends Controller {
    public function __construct() {
        parent::__construct();
        $this->oMembers = new Member;
        $this->oManager = new \Model\MembersManagerPDO;
    }
    //Front-end Application 
    //Login Form page with Ajax
    public function index() {
        if(!$this->oUser->isAuthenticated()){
        $this->oBack->emptyView('Login', 'index'); 
        } else {
            header('location: index.php');
        }
    }    
    
    
    
    //Asynchrone methodes  
    //Methode 1 Authentify A member
    public function auth() {
        header('Content-Type: application/json');
        $this->addOrDeleteAttempts();
        
        $email = htmlspecialchars(!empty($_POST['email']) ? $_POST['email'] : 'user@gmail.com');
        $password = htmlspecialchars(!empty($_POST['password']) ? $_POST['password'] : '123456');
        $aArray = ['email'=>$email,'password'=> $password];
        $this->oMembers->hydrate($aArray);
        $nbOfArrayErrors =(int) count( $this->oMembers->InputErrors());
        
        //Check if The Inputs are in a right format
        //And check if the Input password matches with the saved Password
        if(!$this->isbuteForce()){
            if($this->oMembers->isValidAuthInputs() && $nbOfArrayErrors == 0){
                    if($this->oManager->isMatchedPasswordOf($this->oMembers)){               
                        $aDatas = $this->oManager->getMemberByEmail($this->oMembers->getEmail());
                        $this->oUser->setAuthenticated(TRUE);
                        $this->oUser->setSession('id', $aDatas['id']);
                        $this->oManager->isOnline($aDatas['id'], 1);
                        $this->oUser->setSession('firstname', $aDatas['firstname']);
                        $this->oUser->setSession('lastname', $aDatas['lastname']);
                        $this->oUser->setSession('picture', $aDatas['picture']);
                        echo json_encode(['statut'=>1, 'redirect'=> 'index.php']);
                    }//End is Matched Password?
                else{
                    $response = "Wrong Email or Password";
                    echo json_encode(['statut'=> 2, 'response'=> $response]);
                }
            }//End Valid Inputs
            else {
               echo json_encode(['statut'=>3, 'response'=> 'Your Email is not Valid']);
            }
        }//End Bruete force
        else{
           echo json_encode(['statut'=>4, 'response'=> 'Too many failed login. Retry in 3 minutes']); 
        }
    }
    
    //Deconect the User to the site
    public function deconnect() {
        $this->oManager->isOnline($_SESSION['id'], 0);
        session_destroy();
        header('location: index.php?p=safe&a=login&id=5');
    }
    
    //Brute Force Testing
    private function isbuteForce() {
        $lastAttempts = $this->oManager->lastAttempt();
        $Attempts =$this->oManager->countAttempts();
        if($Attempts >= Config::Max_login_Attempts && (time() < $lastAttempts + Config::Max_login_Time)){ return True;  }
        else { return FALSE;}
    }
    private function addOrDeleteAttempts() {
       $lastAttempts = $this->oManager->lastAttempt();
       $nbReached = $this->oManager->countAttempts();
        if($nbReached < Config::Max_login_Attempts){ $this->oManager->addAttempt();}
        elseif((time() > ($lastAttempts + Config::Max_login_Time)) && ($nbReached >= Config::Max_login_Attempts)){ $this->oManager->deleteAttempts();} 
    }
    //general functions
    
}

