<?php namespace App\Album\Repository;
use App\Database\Repository\Repository;
use App\Album\Entity\AlbumEntity;

class AlbumRepository extends Repository
{
    protected function getEntityName(){return "App\Album\Entity\AlbumEntity";}
    protected function getTableName(){return "album";}
}