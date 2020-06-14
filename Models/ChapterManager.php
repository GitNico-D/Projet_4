<?php

require_once "./Models/Chapter.php";

require_once "./Models/DAO.php";

class ChapterManager extends DAO
{
    public function getChapterById($chapterId) 
    {
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
        // $sqlRequest = 'SELECT * FROM chapter WHERE publish = 1 ORDER BY id ASC';
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
        $sqlRequest = 'INSERT INTO chapter (author, title, content, createDate, updateDate) VALUES (:chapterAuthor, :chapterTitle, :chapterContent, NOW(), NOW())';
        $affectedLines = $this->createQuery($sqlRequest, array(
            'chapterAuthor' => $newChapterAuthor, 
            'chapterTitle' => $newChapterTitle, 
            'chapterContent' => $newChapterContent
        ));
        return $affectedLines;
    }

    public function modifyChapterById($chapterTitle, $chapterContent, $chapterPublish, $chapterId)
    {
        // 'UPDATE chapter SET content =  ,updateDate= NOW(),publish= 0 WHERE id = 2';
        var_dump($chapterContent);
        $sqlRequest = 'UPDATE chapter SET (title = :chapterTitle, content = :chapterContent, updateDate = NOW()) WHERE id = :chapterId';
        var_dump($sqlRequest);
        $upadtedLines = $this->createQuery($sqlRequest, array(
            'chapterAuthor' => $chapterTitle,
            'chapterContent' => $chapterContent,
            'publish' => $chapterPublish,
            'chapterId' => $chapterId
        ));
        return $upadtedLines;
    }

    public function deleteChapterById($chapterId)
    {
        $sqlRequest = 'DELETE FROM chapter WHERE id = ?';
        $result = $this->createQuery($sqlRequest, [$chapterId]);
    }
}

//AdminPassword;