<?php
require_once($_SERVER['DOCUMENT_ROOT']."/App/paths.php");

abstract class Entity
{
    abstract public function getId();
}