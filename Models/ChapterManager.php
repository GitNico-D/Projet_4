<?php

require_once "./Models/Chapter.php";

require_once "./Models/DAO.php";

class ChapterManager extends DAO
{
    public function getChapterById($chapterId) 
    {
        var_dump($chapterId);
        $sqlRequest = 'SELECT * FROM chapter WHERE id = ?';
        $result = $this->createQuery($sqlRequest, [$chapterId]);
        $chapter = $result->fetch();
        $result->closeCursor();
        // Hydratation
        $chapterObj = new Chapter($chapter);
        return $chapterObj;
    }

    public function getAllChapters()
    {
        $sqlRequest = 'SELECT * FROM chapter ORDER BY id ASC';
        $result = $this->createQuery($sqlRequest);
        $chaptersList = [];
        foreach ($result as $chapter)
        {
            $chaptersList [] = new Chapter($chapter);
        }
        $result->closeCursor(); 
        return $chaptersList;
    }

    public function addChapterInDb($newChapterAuthor, $newChapterTitle, $newChapterContent)
    {
        var_dump($newChapterTitle);
        var_dump($newChapterAuthor);
        $sqlRequest = 'INSERT INTO chapter (author, title, content, createDate, updateDate) VALUES (:chapterAuthor, :chapterTitle, :chapterContent, NOW(), NOW())';
        var_dump($sqlRequest);
        $affectedLines = $this->createQuery($sqlRequest, array(
            'chapterAuthor' => $newChapterAuthor, 
            'chapterTitle' => $newChapterTitle, 
            'chapterContent' => $newChapterContent));
        var_dump($affectedLines);
        return $affectedLines;
    }


    public function deleteChapterById($chapterId)
    {
        $sqlRequest = 'DELETE FROM chapter WHERE id = ?';
        $result = $this->createQuery($sqlRequest, [$chapterId]);
    }
}

//AdminPassword;