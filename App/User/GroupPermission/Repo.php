<?php
require_once($_SERVER['DOCUMENT_ROOT']."/App/paths.php");
require_once(DB_DIR."/Repository.php");

class GroupPermissionRepository extends Repository{
    protected function getEntityName(){return "GroupPermissionEntity";}
    protected function getTableName(){return "group_permission";}
}