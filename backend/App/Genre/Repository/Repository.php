<?php namespace App\Genre\Repository;
use App\Database\Repository\Repository;

class GenreRepository extends Repository
{
    protected function getEntityName(){return "GenreEntity";}
    protected function getTableName(){return "genre";}
}
