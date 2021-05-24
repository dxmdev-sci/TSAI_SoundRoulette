<?php


namespace App\Description\Model;


class DescriptionRequest {

    private $album;
    private $description;


    public function getDescription()
    {
        return $this->description;
    }
    public function getAlbum()
    {
        return $this->album;
    }


}