<?php


namespace App\Album\Model;


class AlbumRequest {

	private $name;
	private $general_description;

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
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @param mixed $album_id
     */
    public function setUserId($user_id): void
    {
        $this->user_id = $user_id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getGeneralDescription()
    {
        return $this->general_description;
    }

    /**
     * @param mixed $description
     */
    public function setGeneralDescription($description): void
    {
        $this->general_description = $description;
    }

    /**
     * @return mixed
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * @param mixed $images
     */
    public function setImages($images): void
    {
        $this->images = $images;
    }
    
    /**
     * @return mixed
     */
    public function getLastEdited()
    {
        return $this->last_edited;
    }

    /**
     * @param mixed $last_edited
     */
    public function setLastEdited($last_edited): void
    {
        $this->last_edited = $last_edited;
    }
    
    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * @param mixed $created_at
     */
    public function setCreatedAt($created_at): void
    {
        $this->created_at = $created_at;
    }
    
}