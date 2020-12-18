<?php
require_once($_SERVER['DOCUMENT_ROOT']."/App/paths.php");
require_once(DB_DIR ."/Entity.php");
require_once(ROOT_DIR."/App/User/GroupPermission/Repo.php");

class UserEntity extends Entity {
    private $id;
    private $group_id;  //get only
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
    private function setGroupPermission(){
        $groupRepo = new GroupPermissionRepository();
        $this->group_permission = $groupRepo->getById($this->group_id);
    }
    public function getGroupPermission(){
        if($this->group_permission === null){
            $this->setGroupPermission();
        }
        return $this->group_permission;
    }
    public function getId()             {return $this->id;}
    public function getUsername()       {return $this->username;}
    public function getGroup_id()       {return $this->group_id;}
    public function getEmail()          {return $this->email;}
    public function getProfileImageSrc(){
        if(!empty($this->profile_image)){
            return $this->profile_image;
        }
        return "/images/default_avatar.jpg";
    }
}