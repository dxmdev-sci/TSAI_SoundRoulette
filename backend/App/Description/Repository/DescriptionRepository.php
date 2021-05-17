<?php namespace App\Description\Repository;
use App\Database\Repository\Repository;

class DescriptionRepository extends Repository
{
    protected function getEntityName(){return "App\Description\Entity\DescriptionEntity";}
    protected function getTableName(){return "description";}
}
