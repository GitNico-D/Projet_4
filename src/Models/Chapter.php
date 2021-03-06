<?php

namespace App\src\Models;

use App\src\Core\Model;

class Chapter extends Model
{
    protected $id;
    protected $author;
    protected $title;
    protected $content;
    protected $createDate;
    protected $updateDate;
    protected $published;
    protected $imgUrl;

    public function __construct($attributes = [])
    {
        $this->hydrate($attributes);
    }

    // Setters //

    public function setId($id)
    {
        if (is_numeric($id)) {
            $this->id = $id;
        }
    }

    public function setAuthor($author)
    {
        if (is_string($author)) {
            $this->author = $author;
        }
    }

    public function setTitle($title)
    {
        if (is_string($title)) {
            $this->title = $title;
        }
    }

    public function setContent($content)
    {
        if (is_string($content)) {
            $this->content = $content;
        }
    }

    public function setCreateDate($createDate)
    {
        $this->createDate = $createDate;
    }

    public function setUpdateDate($updateDate)
    {
        $this->updateDate = $updateDate;
    }

    public function setPublished($published)
    {
        $this->published = $published;
    }

    public function setImgUrl($imgUrl)
    {
        $this->imgUrl = $imgUrl;
    }

    // Getters //

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

    public function getCreateDate()
    {
        return $this->createDate;
    }

    public function getUpdateDate()
    {
        return $this->updateDate;
    }

    public function getPublished()
    {
        return $this->published;
    }

    public function getImgUrl()
    {
        return $this->imgUrl;
    }
}
