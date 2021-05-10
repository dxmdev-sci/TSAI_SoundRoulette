<?php namespace App\Description\Entity;

use App\Database\Entity\Entity;
class DescriptionEntity extends Entity {
    private $id;
    private $album_id;
    private $description;
    private $released;

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
    public function getReleased()
    {
        return $this->released;
    }

    /**
     * @param mixed $released
     */
    public function setReleased($released): void
    {
        $this->released = $released;
    }
}