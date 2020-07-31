<?php

namespace App\src\Models;

use App\src\Core\Model;

class Chapter extends Model
{
    private $id;
    private $author;
    private $title;
    private $content;
    private $createDate;
    private $updateDate;
    private $published;
    private $imgUrl;

    public function __construct($attributes = [])
    {
        $this->hydrate($attributes);
    }

    // Setters //

    /**
     * setId
     *
     * @param mixed $id
     * @return void
     */
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
        $error = false;
        if (is_string($content)) {
            $this->content = $content;
        } else {
            $error = true;
        }
        return $error;
    }

    public function setCreateDate($createDate)
    {
        $this->createDate = $createDate;
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

    public function getPublished()
    {
        return $this->published;
    }

    public function getImgUrl()
    {
        return $this->imgUrl;
    }
}
