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

    public function addChapterInDb($newChapterTitle, $newChapterContent, $newChapterAuthor)
    {
        var_dump($_SESSION['loginsEmail']);
        var_dump($_SESSION['loginsStatus']);
        $sqlRequest = 'INSERT INTO chapter (chapterTitle, chapterAuthor, chapterContent, chapterCreateDate, chapterUpdateDate) VALUES (:chapterTitle, :chapterAuthor, :chapterContent, NOW(), NOW())';
        var_dump($sqlRequest);
        $affectedLines = $this->createQuery($sqlRequest, array(
            'chapterTitle' => $newChapterTitle, 
            'chapterAuthor' => $newChapterAuthor, 
            'chapterContent' => $newChapterContent));
        var_dump($affectedLines);
        return $affectedLines;
    }
}