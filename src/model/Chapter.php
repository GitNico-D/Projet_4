<?php

namespace App\src\model;

class Chapter
{
    protected $id;
    protected $author;
    protected $title;
    protected $content;
    protected $createDate;

    public function __construct($chapterAttribute = [])
    {
        $this->hydrate($chapterAttribute);
    }

    public function hydrate(array $data)
    {
        foreach ($data as $key => $chapterAttribute)
        {
            $method = 'set' . ucfirst($key);
            if(method_exists($this, $method))
            {
                $this->$method($chapterAttribute);
            }
        }
    }

    // Setters //

    public function setId($id)
    {
        $this->id = $id;
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
        if (is_string($content))
        {
            $this->content = $content;
        }
    }

    public function setCreateDate($createDate)
    {
        $this->createDate = $createDate;
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
}