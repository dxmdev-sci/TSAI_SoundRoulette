<?php
require_once($_SERVER['DOCUMENT_ROOT']."/App/paths.php");
require_once(DB_DIR."/Entity.php");

class GroupPermissionEntity extends Entity
{
    private $id;
    private $name;
    //permissions
    private $add_song;
    private $delete_song; //delete other's songs permission
    private $edit;
    private $comment_delete; //delete other's comments permission
    private $add_comment;
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getAddSong()
    {
        return $this->add_song;
    }

    /**
     * @return mixed
     */
    public function getDeleteSong()
    {
        return $this->delete_song;
    }

    /**
     * @return mixed
     */
    public function getEdit()
    {
        return $this->edit;
    }

    /**
     * @return mixed
     */
    public function getCommentDelete()
    {
        return $this->comment_delete;
    }

    /**
     * @return mixed
     */
    public function getAddComment()
    {
        return $this->add_comment;
    }

}