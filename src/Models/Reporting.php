<?php

namespace App\src\Models;

use App\src\Core\Model;

class Reporting extends Model
{
    protected $id;
    protected $reportingDate;
    protected $commentId;

    public function __construct($data = [])
    {
        $this->hydrate($data);
    }

    // Setters //

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setReportingDate($reportingDate)
    {
        $this->reportingDate = $reportingDate;
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

    public function getReportingDate()
    {
        return $this->reportingDate;
    }

    public function getCommentId()
    {
        return $this->commentId;
    }
}
