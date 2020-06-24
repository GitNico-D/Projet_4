<?php

namespace App\src\Managers;

use App\src\Models\DAO;
use App\src\Models\Chapter;

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

    public function getAllPublishedChapters()
    {
        $sqlRequest = 'SELECT * FROM chapter WHERE published = true ORDER BY id ASC';
        $result = $this->createQuery($sqlRequest);
        $publishedChaptersList = [];
        foreach ($result as $chapter)
        {
            $publishedChaptersList [] = new Chapter($chapter);
        }
        $result->closeCursor(); 
        return $publishedChaptersList;
    }

    public function getAllUnpublishedChapters()
    {
        $sqlRequest = 'SELECT * FROM chapter WHERE published = false ORDER BY id ASC';
        $result = $this->createQuery($sqlRequest);
        $unpublishedChaptersList = [];
        foreach ($result as $chapter)
        {
            $unpublishedChaptersList [] = new Chapter($chapter);
        }
        $result->closeCursor(); 
        return $unpublishedChaptersList;
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
        $updatedLines = $this->createQuery($sqlRequest, array(
            'chapterTitle' => $chapterTitle,
            'chapterContent' => $chapterContent,
            // 'publish' => $chapterPublish,
            'chapterId' => $chapterId
        ));
        return $updatedLines;
    }

    public function deleteChapterById($chapterId)
    {
        $sqlRequest = 'DELETE FROM chapter WHERE id = ?';
        $result = $this->createQuery($sqlRequest, [$chapterId]);
    }
}

//AdminPassword;