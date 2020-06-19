<?php

include_once "./Models/Model.php";

class Chapter extends Model
{
    private $id;
    private $author;
    private $title;
    private $content;
    private $createDate;
    private $updateDate;
    private $publish;

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
        if (is_numeric($id))
        {
            $this->id = $id;
        }
    }

    public function setAuthor($author)
    {
        if (is_string($author))
        {
            $this->author = $author;
        }
    }

    public function setTitle($title)
    {
        if (is_string($title))
        {
            $this->title = $title;
        }
    }

    public function setContent($content)
    {
        $error = false;
        if (is_string($content))
        {
            $this->content = $content;
        }
        else 
        {
            $error = true;
        }
        return $error;
    }

    public function setCreateDate($createDate)
    {
        $this->createDate = $createDate;
    }

    public function setPublish($publish)
    {
        $this->publish = $publish;
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

    public function getPublish()
    {
        return $this->publish;
    }
}