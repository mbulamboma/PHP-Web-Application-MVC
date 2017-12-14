<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Model;
use \Framework\Manager;
use \Entity\Member;
use \Config\Config;
/**
 * Description of MembersManagerPDO
 *
 * @author mbula
 */
class MembersManagerPDO extends Manager {
    public function _construct() {
        parent::__construct();       
    }
    //FrontEnd Application Part
    public function getAColumnValueById($column, $id) {
        $query= $this->oDb->prepare('SELECT :column members WHERE members.id = :id');
        $query->bindValue(':column',$column, \PDO::PARAM_STR);
        $query->bindValue(':id',$id, \PDO::PARAM_INT); 
        $query->CloseCursor();
    }
    public function getMemberbyEmail($email)
    {
        $oStmt = $this->oDb->prepare('SELECT * FROM Members WHERE email = :email');
        $oStmt->bindValue(':email',$email, \PDO::PARAM_STR);
        $oStmt->execute();
        $aDatas = $oStmt->fetch();
        $oStmt->CloseCursor();
        return $aDatas;
    }
    public function getAll()
    {
        $oStmt = $this->oDb->prepare('SELECT * FROM Members');
        $oStmt->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Member');
        $oStmt->execute();
        $oAll = $oStmt->fetchAll();
        $oStmt->CloseCursor();
        return $oAll;
    }
    public function countAllMembers() {
        $query =$this->oDb->prepare('SELECT COUNT(*) AS nbr FROM members');
        $query->execute();
        $data = $query->fetch();
        $query->CloseCursor();
        $total = $data['nbr'] +1;
        return $total;
    }
    public function getByPage($page) {
        $MemberPrPage = Config::MEMBER_PER_PAGE;
        $first = ($page - 1) * $MemberPrPage;
        $oList = $this->oDb->prepare('SELECT * FROM Members ORDER BY :sort  :tri LIMIT :first, :nbrPerPage');
        $oList->bindValue('first', $first, \PDO::PARAM_INT);
        $oList->bindValue('tri', Config::aTRI[$this->cTri], \PDO::PARAM_INT);
        $oList->bindValue('sort', Config::aMEMBER_SORT_BY[$this->cSort], \PDO::PARAM_INT);
        $oList->bindValue('nbrPerPage', $MemberPrPage, \PDO::PARAM_INT);
        $oList->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Member');
        $oList->execute();
        $oAll = $oList->fetchAll();
        $oList->CloseCursor();
        return $oAll;  
    }
    public function isFreeEmail($value) {
        $query= $this->oDb->prepare('SELECT COUNT(*) AS nbr FROM members WHERE email =:value');
        $query->bindValue(':value',$value, \PDO::PARAM_STR);
        $query->execute();
        $iskey_free=($query->fetchColumn()==0)?1:0;
        $query->CloseCursor();
        return $iskey_free;
    }
    public function isMatchedPasswordOf(Member $oMember) {
        $query= $this->oDb->prepare('SELECT * FROM members WHERE email =:value');
        $query->bindValue(':value',$oMember->getEmail(), \PDO::PARAM_STR);
        $query->execute();
        $data=$query->fetch();
        $query->CloseCursor();
        if ($data['password'] == $oMember->getPassword()){return TRUE;} else { return FALSE;}
    }
    public function registerStep1(Member $oMember) {
        $query= $this->oDb->prepare('INSERT INTO members (firstname, lastname, email, password, lastvisit, registration_date, ip)
                VALUES (:firstname, :lastname, :email, :password, :date, :date, :ip)'); 
        $query->bindValue(':firstname',$oMember->getFirstname(), \PDO::PARAM_STR);
        $query->bindValue(':lastname',$oMember->getLastname(), \PDO::PARAM_STR);
        $query->bindValue(':email',$oMember->getEmail(), \PDO::PARAM_STR);
        $query->bindValue(':password',$oMember->getPassword(), \PDO::PARAM_STR);
        $query->bindValue(':date',time(), \PDO::PARAM_INT);
        $query->bindValue(':ip', htmlspecialchars($_SERVER['REMOTE_ADDR']), \PDO::PARAM_INT);
        $query->execute();
        $_SESSION['id'] = $this->oDb->lastInsertId();
        $query->CloseCursor();
    }
    public function registrationUpdate2(Member $oMember) {
        $query= $this->oDb->prepare('UPDATE members SET city = :city, motivation = :motivation, phone = :phone, 
        picture = :picture WHERE members.id = :id'); 
        $query->bindValue(':city',$oMember->getCity(), \PDO::PARAM_STR);
        $query->bindValue(':motivation',$oMember->getMotivation(), \PDO::PARAM_STR);
        $query->bindValue(':phone',$oMember->getPhone(), \PDO::PARAM_STR);
        $query->execute();
        $query->CloseCursor();
    }
    public function addPicture($picture) {
        $query= $this->oDb->prepare('UPDATE members SET picture = :picture WHERE members.id = :id');
        $query->bindValue(':id',$_SESSION['id'], \PDO::PARAM_STR);
        $query->bindValue(':picture',$picture, \PDO::PARAM_STR);
        $query->execute();
        $query->CloseCursor();
    }
   public function modifyProfilOf(Member $oMember) {
        $query= $this->oDb->prepare('UPDATE members SET firstname = :firstname, lastname = :lastname, email = :email, 
        password = :password, city = :city, motivation = :motivation, phone = :phone, 
        picture = :picture, registration_date = :date WHERE members.id = :id');
        $query->bindValue(':firstname',$oMember->getFirstname(), \PDO::PARAM_STR);
        $query->bindValue(':lastname',$oMember->getLastname(), \PDO::PARAM_STR);
        $query->bindValue(':email',$oMember->getEmail(), \PDO::PARAM_STR);
        $query->bindValue(':password',$oMember->getPassword(), \PDO::PARAM_STR);
        $query->bindValue(':city',$oMember->getCity(), \PDO::PARAM_STR);
        $query->bindValue(':motivation',$oMember->getMotivation(), \PDO::PARAM_STR);
        $query->bindValue(':phone',$oMember->getPhone(), \PDO::PARAM_STR);
        $query->bindValue(':picture',$oMember->getPicture(), \PDO::PARAM_STR);
        $query->bindValue(':date',$oMember->getRegistration_date(), \PDO::PARAM_INT);
        $query->bindValue(':id',$oMember->id(), \PDO::PARAM_INT);
        $query->execute();
        $query->CloseCursor();
    }
    public function incrementColumn($sColumn, Member $oMember) {
        $query= $this->oDb->prepare('UPDATE members SET :column = :column + 1 WHERE members.id = :id');
        $query->bindValue(':column',$sColumn, \PDO::PARAM_STR);
        $query->bindValue(':id',$oMember->id(), \PDO::PARAM_INT);
        $query->CloseCursor();
    }
    //Tells the Db that A member logged in
    public function isOnline($id, $bool) {
        $query= $this->oDb->prepare('UPDATE members SET is_online = :value WHERE members.id = :id');
        $query->bindValue(':value',$bool, \PDO::PARAM_INT);
        $query->bindValue(':id',$id, \PDO::PARAM_INT);
        $query->execute();
        $query->CloseCursor();
    }
    
    //Brute Forcing When Logining
    public function addAttempt() {
        $attempt= $this->oDb->prepare('INSERT INTO user_failed_logins (ip_address, attempted_at) VALUES (:ip, :time)');
        $attempt->bindValue(':ip', htmlspecialchars($_SERVER['REMOTE_ADDR']), \PDO::PARAM_STR);
        $attempt->bindValue(':time',time(), \PDO::PARAM_INT);
        $attempt->execute();
        $attempt->CloseCursor();
    }
    public function countAttempts() {
        $count =$this->oDb->prepare('SELECT COUNT(*) AS nbr FROM user_failed_logins WHERE ip_address = :ip');
        $count->bindValue(':ip',$_SERVER['REMOTE_ADDR'], \PDO::PARAM_STR);
        $count->execute();
        $data = $count->fetch();
        $count->CloseCursor();
        $total = $data['nbr'];
        return $total;
    }
    public function lastAttempt() {
        $count = $this->oDb->prepare('SELECT MAX(attempted_at) AS attempted_at FROM user_failed_logins WHERE ip_address = :ip');
        $count->bindValue(':ip',$_SERVER['REMOTE_ADDR'], \PDO::PARAM_STR);
        $count->execute();
        $row = $count-> fetch();
        $count->CloseCursor();
        return $row['attempted_at'];
    }
    public function deleteAttempts() {
        $oStmt = $this->oDb->prepare('DELETE FROM user_failed_logins WHERE user_failed_logins.ip_address= :ip');
        $oStmt->bindValue(':ip',$_SERVER['REMOTE_ADDR'], \PDO::PARAM_STR);
        $oStmt->execute();
        $oStmt->CloseCursor();
    }
    
    
    
   //BackEnd application Part
   public function delete($iId) {
        $oStmt = $this->oDb->prepare('DELETE FROM members WHERE id = :id LIMIT 1');
        $oStmt->bindParam(':id', $iId, \PDO::PARAM_INT);
        $oStmt->execute();
        $oStmt->CloseCursor();
   }
}
