<?php

namespace App\src\Managers;

use App\src\Core\Manager;

class ReportingManager extends Manager
{
    public function totalReportCount()
    {
        $sqlRequest = 'SELECT COUNT(*) as totalReport, commentId FROM reporting GROUP BY commentId';
        $result = $this->createQuery($sqlRequest);
        $totalReporting = [];
        foreach($result as $data){
            $totalReporting [] = $data;
        }
        $result->closeCursor();
        return $totalReporting;
    }

    public function deleteReport($deleteReport)
    {
        $sqlRequest = "DELETE FROM " . $this->table . " WHERE commentId = ?";
        foreach($deleteReport as $deleteReport) {
            $commentId = $deleteReport->getCommentId();
        }
        $this->createQuery($sqlRequest, [$commentId]);
    }
}