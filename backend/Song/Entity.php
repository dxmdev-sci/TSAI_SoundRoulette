<?php
require_once(DB_DIR."/Entity.php");

class SongEntity extends Entity {
    private $id;
    private $album_id;
    private $description_id;
    private $reference;
    private $user_id;
    private $genre_id;

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
    public function getDescriptionId()
    {
        return $this->description_id;
    }

    /**
     * @param mixed $description_id
     */
    public function setDescriptionId($description_id): void
    {
        $this->description_id = $description_id;
    }

    /**
     * @return mixed
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * @param mixed $reference
     */
    public function setReference($reference): void
    {
        $this->reference = $reference;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @param mixed $user_id
     */
    public function setUserId($user_id): void
    {
        $this->user_id = $user_id;
    }

    /**
     * @return mixed
     */
    public function getGenreId()
    {
        return $this->genre_id;
    }

    /**
     * @param mixed $genre_id
     */
    public function setGenreId($genre_id): void
    {
        $this->genre_id = $genre_id;
    }
}