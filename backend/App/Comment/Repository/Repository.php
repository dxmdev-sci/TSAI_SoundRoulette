<?php namespace App\Comment\Repository;
use App\Database\Repository\Repository;

class CommentRepository extends Repository
{
    protected function getEntityName(){return "App\Comment\Entity\CommentEntity";}
    protected function getTableName(){return "comment";}
}