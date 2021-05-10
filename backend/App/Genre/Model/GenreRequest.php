<?php


namespace App\Genre\Model;


class GenreRequest {

    private $name;

    /**
     * @return mixed
     */
    public function getName() {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return GenreRequest
     */
    public function setName($name) {
        $this->name = $name;
        return $this;
    }

}