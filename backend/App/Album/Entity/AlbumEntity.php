<?php namespace App\Album\Entity;

use App\Database\Entity\Entity;

class AlbumEntity extends Entity
{
    private $id;
    private $user_id;
    private $name;
    private $general_description;

    public function getId(){
       return $this->id;
    }
    public function getUser_id(){
        return $this->user_id;
    }
    public function getName(){
        return $this->name;
    }
    public function getGeneralDescription(){
        return $this->general_description;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function setGeneralDescription($description): void
    {
        $this->general_description = $description;
    }

    public function setName($name): void
    {
        $this->name = $name;
    }

    public function setUserId($user_id): void
    {
        $this->user_id = $user_id;
    }
}