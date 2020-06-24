<?php

namespace App\src\Models;

use App\src\Core\Model;

class Comment extends Model
{   
    private $id;
    private $author;
    private $title;
    private $content;
    private $createdDate;
    private $updatedDate;
    private $chapterId;

    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    //SETTERS

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setAuthor($author)
    {
        $this->author = $author;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function setCreatedDate($createdDate)
    {
        $this->createdDate = $createdDate;
    }

    public function setUpdatedDate($updatedDate)
    {
        $this->updatedDate = $updatedDate;
    }

    public function setChapterId($chapterId)
    {
        $this->chapterId = $chapterId;
    }

    //GETTERS

    public function getId()
    {
        return $this->id;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function getCreatedDate()
    {
        return $this->createdDate;
    }

    public function getUpdatedDate()
    {
        return $this->updatedDate;
    }

    public function getChapterId()
    {
        return $this->chapterId;
    }
}