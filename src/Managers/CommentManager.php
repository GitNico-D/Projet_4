<?php

namespace App\src\Managers;

use App\src\Core\Manager;
use App\src\Models\Comment;

class CommentManager extends Manager
{
    // public function deleteChapterComments($chapterId)
    // {
    // $this->table = 'comment';
    //     return $this->delete($this->table, array('chapterId' => $chapterId));
    // }

    /**
     * getAllReportedComments
     *
     * @return array
     */
    public function getAllReportedComments()
    {
        $sqlRequest = 'SELECT comment.id, comment.author, comment.content, comment.createdDate, comment.chapterId, reporting.reportingDate
                        FROM comment INNER JOIN reporting ON comment.id = reporting.commentId GROUP BY reporting.commentId';
        $result = $this->createQuery($sqlRequest);
        $reportedCommentList = [];
        foreach ($result as $comment) {
            $reportedCommentList [] = new Comment($comment);
        }
        $result->closeCursor();
        return $reportedCommentList;
    }
}
