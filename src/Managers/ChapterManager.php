<?php

namespace App\src\Managers;

use App\src\Core\Manager;

class ChapterManager extends Manager
{
    // public function chapterAndComments($chapterId)
    // {
    //     $sqlRequest = 'SELECT chapter.id, chapter.title, chapter.content, chapter.createDate, comment.author, comment.content 
    //                     FROM chapter 
    //                     INNER JOIN comment 
    //                     WHERE chapter.id = comment.chapterId';
    //     $requestResult = $this->createQuery($sqlRequest, [$chapterId]);
    //     foreach ($requestResult as $data){
    //         var_dump($data);
    //     }        
    // }

}
