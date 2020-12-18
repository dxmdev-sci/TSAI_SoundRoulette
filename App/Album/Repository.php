<?php
require_once(DB_DIR."/Repository.php");

class AlbumRepository extends Repository
{
    protected function getEntityName(){return "AlbumEntity";}
    protected function getTableName(){return "album";}
}