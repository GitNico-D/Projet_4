<?php

class Article
{
    protected $id;
    protected $author;
    protected $title;
    protected $content;
    protected $creationDate;

    public function __construct($articleAttribute = [])
    {
        $this->hydrate($articleAttribute);
    }

    public function hydrate($articleAttribute)
    {
        foreach ($data as $key => $articleAttribute)
        {
            $method = 'set' . ucfirst($articleAttribute);
            if(method_exists($this, $method))
            {
                $this->$method($articleAttribute);
            }
        }
    }

    // Setters

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setAuthor($author)
    {
        $this->$author = $author;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;
    }

    // Getters

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

    public function getCreationDate()
    {
        return $this->creationDate;
    }
}