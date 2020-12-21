<?php
require_once($_SERVER['DOCUMENT_ROOT']."/App/paths.php");
require_once (DB_DIR."/Repository.php");
require_once("Entity.php");

class DescriptionRepository extends Repository
{
    protected function getEntityName(){return "DescriptionEntity";}
    protected function getTableName(){return "description";}
}
