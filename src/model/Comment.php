<?php

namespace App\src\model;

class Comment
{   
    private $commentId;
    private $commentAuthor;
    private $commentTitle;
    private $commentContent;
    private $commentCreatedDate;
    private $commentUpdatedDate;
    // private $chapterId;

    public function __construct(array $commentData)
    {
        $this->hydrate($commentData);
    }

    public function hydrate(array $data)
    {
        foreach($data as $key => $commentData)
        {
            $method = 'set' . ucfirst($key);
            if(method_exists($this, $method))
            {
                $this->$method($commentData);
            }
        }
    }

    //SETTERS

    public function setCommentId($commentId)
    {
        $this->commentId = $commentId;
    }

    public function setCommentAuthor($commentAuthor)
    {
        $this->commentAuthor = $commentAuthor;
    }

    public function setCommentTitle($commentTitle)
    {
        $this->commentTitle = $commentTitle;
    }

    public function setCommentContent($commentContent)
    {
        $this->commentContent = $commentContent;
    }

    public function setCommentCreatedDate($commentCreatedDate)
    {
        $this->commentCreatedDate = $commentCreatedDate;
    }

    public function setCommentUpdatedDate($commentUpdatedDate)
    {
        $this->commentUpdatedDate = $commentUpdatedDate;
    }

    //GETTERS

    public function getCommentId()
    {
        return $this->commentId;
    }

    public function getCommentAuthor()
    {
        return $this->commentAuthor;
    }

    public function getCommentTitle()
    {
        return $this->commentTitle;
    }

    public function getCommentContent()
    {
        return $this->commentContent;
    }

    public function getCommentCreatedDate()
    {
        return $this->commentCreatedDate;
    }

    public function getCommentUpdatedDate()
    {
        return $this->commentUpdatedDate;
    }
}