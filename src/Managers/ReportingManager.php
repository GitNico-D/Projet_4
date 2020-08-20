<?php

namespace App\src\Managers;

use App\src\Core\Manager;
use App\src\Models\Comment;
use App\src\Models\Reporting;
use PDOStatement;

class ReportingManager extends Manager
{
    public function totalReportCount()
    {
        $sqlRequest = 'SELECT COUNT(*) as totalReport, commentId FROM `reporting` GROUP BY commentId';
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
        var_dump($deleteReport);
        $sqlRequest = "DELETE FROM " . $this->table . " WHERE commentId = :commentId";
        $commentId [] = ['commentId' => $deleteReport->getCommentId()];
        var_dump($commentId);
        // $this->createQuery($sqlRequest, ['commentId' => $deleteEntity->getCommentId()]);
    }
}