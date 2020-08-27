<?php

namespace App\src\Models;

use App\src\Core\Model;
use App\src\Core\FormValidator;
use Exception;
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
    // public $formValidator;

    public function __construct($attributes = [])
    {
        // $this->formValidator = new FormValidator;
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
        if(!is_string($author)) {
            throw new Exception('Le champ de l\'auteur est vide');
        } else {
            $this->author = $author;
        } 
    }

    public function setTitle($title)
    {
        if(!is_string($title) || empty($title)) {
            throw new Exception('Le champ de titre est vide');
        } else {
            $this->title = $title;
        } 
    }

    public function setContent($content)
    {
        if (!is_string($content) || empty($content)) {
            throw new Exception('Le contenu est vide');
        } else {
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
