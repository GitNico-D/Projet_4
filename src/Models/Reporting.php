<?php

namespace App\src\Models;

use App\src\Core\Model;

class Reporting extends Model
{
    private $reportId;
    private $reportingDate;
    private $commentId;

    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    // Setters //

    public function setReportId($reportId)
    {
        $this->reportId = $reportId;
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

    public function getReportId()
    {
        return $this->reportId;
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
