<?php namespace App\Description\Entity;

use App\Database\Entity\Entity;
class DescriptionEntity extends Entity {
    private $id;
    private $author;
    private $description;
    private $created_at;
    private $album;

    /**
     * @return mixed
     */
    public function getAlbum()
    {
        return $this->album;
    }

    /**
     * @param mixed $album
     */
    public function setAlbum($album): void
    {
        $this->album = $album;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getAlbumId()
    {
        return $this->album_id;
    }

    /**
     * @param mixed $album_id
     */
    public function setAlbumId($album_id): void
    {
        $this->album_id = $album_id;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * @param mixed $released
     */
    public function setCreatedAt($released): void
    {
        $this->created_at = $released;
    }
    public function setAuthor($userId){
        $this->author = $userId;
    }
    public function getAuthor(){
        return $this->author;
    }
}