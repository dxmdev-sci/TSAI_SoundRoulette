<?php namespace App\Description\Repository;
use App\Database\Repository\Repository;

class DescriptionRepository extends Repository
{
    protected function getEntityName(){return "DescriptionEntity";}
    protected function getTableName(){return "description";}
}
