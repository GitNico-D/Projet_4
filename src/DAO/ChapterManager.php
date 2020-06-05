<?php

namespace App\src\DAO;

use App\src\model\Chapter;

class ChapterManager extends DAO
{
    private $chapter;

    public function createObjectChapter(array $data)
    {
        $chapter = new Chapter($data);
        return $chapter;
    }

    public function getChapterById($chapterId) 
    {
        $sqlRequest = 'SELECT * FROM chapter WHERE chapterId = ?';
        $result = $this->createQuery($sqlRequest, [$chapterId]);
        $chapter = $result->fetch();
        $result->closeCursor();
        return $this->createObjectChapter($chapter);
    }

    public function getAllChapters()
    {
        $sqlRequest = 'SELECT * FROM chapter ORDER BY chapterId ASC';
        $result = $this->createQuery($sqlRequest);
        $chaptersList = [];
        foreach ($result as $chapter)
        {
            $chaptersList [] = $this->createObjectChapter($chapter);
        }
        $result->closeCursor(); 
        return $chaptersList;
    }

    public function addChapterInDb($newChapterAuthor, $newChapterTitle, $newChapterContent)
    {
        var_dump($_SESSION['loginsEmail']);
        var_dump($_SESSION['loginsStatus']);
        $sqlRequest = 'INSERT INTO chapter (chapterAuthor, chapterTitle, chapterContent, chapterCreateDate, chapterUpdateDate) VALUES (:chapterAuthor, :chapterTitle,  :chapterContent, NOW(), NOW())';
        var_dump($sqlRequest);
        $affectedLines = $this->createQuery($sqlRequest, array(
            'chapterAuthor' => $newChapterAuthor, 
            'chapterTitle' => $newChapterTitle, 
            'chapterContent' => $newChapterContent));
        var_dump($affectedLines);
        return $affectedLines;
    }

    // public function addChapterInDb(Chapter $chapter)
    // {
        // var_dump($_SESSION['loginsEmail']);
    //     extract($chapter);
    //     var_dump($chapter);
    //     $sqlRequest = 'INSERT INTO chapter (chapterTitle, chapterAuthor, chapterContent, chapterCreateDate, chapterUpdateDate) VALUES (:chapterTitle, :chapterAuthor, :chapterContent, NOW(), NOW())';
    //     var_dump($sqlRequest);
    //     $affectedLines = $this->createQuery($sqlRequest, array(
    //         'chapterTitle' => $chapterTitle, 
    //         'chapterAuthor' => $chapterAuthor, 
    //         'chapterContent' => $chapterContent));
    //     var_dump($affectedLines);
    //     return $affectedLines;
    // }
}