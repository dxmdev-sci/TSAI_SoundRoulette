<?php namespace App\Comment\Entity;

use App\Database\Entity\Entity;

class CommentEntity extends Entity
{
    private $id;
    private $author;
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
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getReleased()
    {
        return $this->released;
    }
}