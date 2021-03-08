<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/backend/paths.php");
require_once (DB_DIR."/Repository.php");
require_once("Entity.php");

class GenreRepository extends Repository
{
    protected function getEntityName(){return "GenreEntity";}
    protected function getTableName(){return "genre";}
}
