<?php namespace App\Album\Entity;

use App\Database\Entity\Entity;

class AlbumEntity extends Entity
{
    private $id;
    private $user_id;
    private $name;
    private $description;

    public function getId(){
       return $this->id;
    }
    public function getUser_id(){
        return $this->user_id;
    }
    public function getName(){
        return $this->name;
    }
    public function getDescription(){
        return $this->description;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function setDescription($description): void
    {
        $this->description = $description;
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