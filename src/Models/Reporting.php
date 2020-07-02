<?php

namespace App\src\Models;

use App\src\Core\Model;

class Reporting extends Model
{
    private $id;
    private $date;
    private $commentId;

    public function __construct(Array $data)
    {
        $this->hydrate($data);
    }

    // Setters //

    public function setId($id)
    {        
        $this->id = $id;
    }

    public function setDate($date)
    {        
        $this->date = $date;
    }

    public function setCommentId($commentId)
    {        
        $this->commentId = $commentId;
    }

    // Getters //

    public function getId()
    {
        return $this->id;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function getCommentId()
    {
        return $this->commentId;
    }

}