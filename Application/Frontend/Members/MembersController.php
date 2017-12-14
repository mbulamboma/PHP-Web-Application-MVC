<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Application\Frontend\Members;
use \Framework\Controller;
/**
 * Description of MembersController
 *
 * @author mbula
 */
class MembersController  extends Controller{
   public function __construct() {
        parent::__construct();
        $this->oMembers = new \Entity\Member;
        $this->oBack->getManagerOf('Members');
        $this->oModel = new \Model\MembersManagerPDO;
    }
    //Front-end Index of Gallery
    public function index() {
        $member =['id'=> 'NULL','firstname'=> 'Yedida','lastname'=> 'Mbula','email'=> 'Maria@gmail.com',
            'password'=> '12345','city'=> 'kinshasa','motivation'=> 'motivation','phone'=> '5555','picture'=> 'user.png'];
        $this->oMembers->hydrate($member);
        
        if(!$this->oMembers->isValid()) {print_r($this->oMembers->errors());}
        else {echo 'Inserted<br />'; $this->oModel->add($this->oMembers); }
        $this->oMembers->setId(17);
        $this->oModel->modifyProfilOf($this->oMembers);
        $this->oBack->bFree = $this->oModel->isFree('firstname', 'maria');
        $this->oBack->bAuth = $this->oModel->isMatchedPasswordOf($this->oMembers);
        $this->oBack->iTotal = $this->oModel->getByPage($this->_step);
        $this->oBack->getView('Members', 'index');
    }
}
