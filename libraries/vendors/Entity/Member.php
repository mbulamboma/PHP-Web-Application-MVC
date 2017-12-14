<?php
namespace Entity;

use \Framework\Entity;

class Member extends Entity
{
  public    $firstname,
            $lastname,
            $email,
            $password,
            $city,
            $motivation,
            $phone,
            $picture,
            $registration_date,
            $lastvisit,
            $is_online,
            $ip,
            $messages_sent;
            
  
  public function isValidAuthInputs()
  {
    return !(empty($this->email) || empty($this->password));
  }
  public function isValidinputs()
  {
    return !(empty($this->firstname) || empty($this->email) || empty($this->password) || empty($this->lastname));
  }

  function getFirstname() {
      return $this->firstname;
  }

  function getLastname() {
      return $this->lastname;
  }

  function getEmail() {
      return $this->email;
  }

  function getPassword() {
      return $this->password;
  }

  function getCity() {
      return $this->city;
  }

  function getMotivation() {
      return $this->motivation;
  }

  function getPhone() {
      return $this->phone;
  }

  function getPicture() {
      return $this->picture;
  }

  function getRegistration_date() {
      return $this->registration_date;
  }
  function getLastvisit() {
      return $this->lastvisit;
  }
  function getIs_online() {
      return $this->is_online;
  }

  function getIp() {
      return $this->ip;
  }

  function getMessages_sent() {
      return $this->messages_sent;
  }

  function setIs_online($is_online) {
      $this->is_online = (int)$is_online;
  }

  function setIp($ip) {
      $this->ip = $ip;
  }

  function setMessages_sent($messages_sent) {
      $this->messages_sent = (int) $messages_sent;
  }

    function setLastvisit($lastvisit) {
      $this->lastvisit = (int)$lastvisit;
    }

    function setFirstname($firstname) {
     if (!is_string($firstname) || empty($firstname) || strlen($firstname) < 3 || strlen($firstname) > 35)
    {
      $this->InputErrors[] = 'Your First name must have at least 6 characters';
    }
      $this->firstname = $firstname;
  }

  function setLastname($lastname) {
       if (!is_string($lastname) || empty($lastname) || strlen($lastname) < 3 || strlen($lastname) > 35)
    {
      $this->InputErrors[] = 'Your lastname must have at least 6 characters';
    }
      $this->lastname = $lastname;
  }

  function setEmail($email) {
      if (!preg_match("#^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]{2,}\.[a-z]{2,4}$#", $email) || empty($email)){
          $this->InputErrors[] = 'Wrong email!';
      }
      $this->email = $email;
  }

  function setPassword($password) {
      $this->password = $password;
  }

  function setCity($city) {
      if (!is_string($city) || empty($city) || strlen($city) < 3){
          $this->InputErrors[] = 'At least 4 characteres are required';
      }
      $this->city = $city;
  }

  function setMotivation($motivation) {
      if (empty($city) || strlen($motivation) < 5 || strlen($motivation) > 400){
          $this->InputErrors[] = 'Your Motivation is too short or too long';
      }
      $this->motivation = $motivation;
  }

  function setPhone($phone) {
      $this->phone = $phone;
  }

  function setPicture($picture) {
      $this->picture = $picture;
  }

  function setRegistration_date($date) {
      $this->registration_date = $date;
  }

}