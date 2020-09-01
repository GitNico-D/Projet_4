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
}