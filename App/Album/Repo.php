<?php
require_once($_SERVER['DOCUMENT_ROOT']."/App/paths.php");
require_once(DB_DIR."/Repository.php");
require_once("Entity.php");

class AlbumRepository extends Repository
{
    protected function getEntityName(){return "AlbumEntity";}
    protected function getTableName(){return "album";}
}