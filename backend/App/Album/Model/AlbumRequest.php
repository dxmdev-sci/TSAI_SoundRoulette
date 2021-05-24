<?php


namespace App\Album\Model;


class AlbumRequest {

    private $user_id;
	private $name;
	private $general_description;
	private $created_at;


    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }


    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }


    /**
     * @return mixed
     */
    public function getGeneralDescription()
    {
        return $this->general_description;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }


    
}