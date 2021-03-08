<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/backend/paths.php");
require_once(DB_DIR."/Repository.php");
require_once("Entity.php");

class CommentRepository extends Repository
{
    protected function getEntityName(){return "CommentEntity";}
    protected function getTableName(){return "comment";}
}