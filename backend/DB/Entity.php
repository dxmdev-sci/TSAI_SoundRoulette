<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/backend/paths.php");

abstract class Entity
{
    abstract public function getId();
}