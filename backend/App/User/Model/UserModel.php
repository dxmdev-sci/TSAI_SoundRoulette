<?php


namespace App\User\Model;


class UserModel {

    private $id;
    private $group_id;
    private $username;
    private $email;
    private $profile_image;
    //
    protected $group_permission;
    //
    public function setId($id){
        $this->id = $id;
    }
    public function setUsername($name){
        $this->username = $name;
    }
    public function setEmail($address){
        $this->email = $address;
    }
    public function setProfileImageSrc($profile_image): void{
        $this->profile_image = $profile_image;
    }
    public function getProfileImageSrc($profile_image){
        return $this->profile_image;
    }
    public function setGroupId($id){
        $this->group_id = $id;
    }
    public function getGroupId(){
        return $this->group_permission;
    }
    public function getId()             {return $this->id;}
    public function getUsername()       {return $this->username;}
    public function getGroup_id()       {return $this->group_id;}
    public function getEmail()          {return $this->email;}
}