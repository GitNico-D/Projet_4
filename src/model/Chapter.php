<?php

namespace App\src\model;

class Chapter
{
    protected $chapterId;
    protected $chapterAuthor;
    protected $chapterTitle;
    protected $chapterContent;
    protected $chapterCreateDate;
    protected $chapterUpdateDate;

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

    public function setChapterId($chapterId)
    {
        $this->chapterId = $chapterId;
    }

    public function setChapterAuthor($chapterAuthor)
    {
        if (is_string($chapterAuthor))
        {
            $this->chapterAuthor = $chapterAuthor;
        }
    }

    public function setChapterTitle($chapterTitle)
    {
        if (is_string($chapterTitle))
        {
            $this->chapterTitle = $chapterTitle;
        }
    }

    public function setChapterContent($chapterContent)
    {
        if (is_string($chapterContent))
        {
            $this->chapterContent = $chapterContent;
        }
    }

    public function setChapterCreateDate($chapterCreateDate)
    {
        $this->chapterCreateDate = $chapterCreateDate;
    }

    // Getters //

    public function getChapterId()
    {
        return $this->chapterId;
    }

    public function getChapterAuthor()
    {
        return $this->chapterAuthor;
    }

    public function getChapterTitle()
    {
        return $this->chapterTitle;
    }

    public function getChapterContent()
    {
        return $this->chapterContent;
    }

    public function getChapterCreateDate()
    {
        return $this->chapterCreateDate;
    }
}