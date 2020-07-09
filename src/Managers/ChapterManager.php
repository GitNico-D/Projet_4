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

    public function publishedChapter($chapterId)
    {
        $sqlRequest = 'UPDATE chapter SET published= true where id = ?';
        $this->createQuery($sqlRequest, [$chapterId]);
    } 

    public function addChapterInDb($newChapterAuthor, $newChapterTitle, $newChapterContent)
    {
        $sqlRequest = 'INSERT INTO chapter (author, title, content, createDate, updateDate) VALUES (:chapterAuthor, :chapterTitle, :chapterContent, NOW(), NOW())';
        $affectedLines = $this->createQuery($sqlRequest, array(
            'chapterAuthor'=>$newChapterAuthor, 
            'chapterTitle'=>$newChapterTitle, 
            'chapterContent'=>$newChapterContent
        ));
        return $affectedLines;
    }

    public function updateChapterById($updatedChapterTitle, $updatedChapterContent, $chapterPublished, $chapterId)
    {
        var_dump($updatedChapterTitle);
        var_dump($updatedChapterContent);
        var_dump($chapterPublished);
        var_dump($chapterId);
        $sqlRequest = 'UPDATE chapter SET title= :updatedChapterTitle, content= :updatedChapterContent, updateDate = NOW(), published= :chapterPublished WHERE id = :chapterId';
        $updatedLines = $this->createQuery($sqlRequest, array(   
                'updatedChapterTitle' => $updatedChapterTitle,
                'updatedChapterContent' => $updatedChapterContent,
                'chapterPublished' => $chapterPublished,
                'id' => $chapterId
                ));
        var_dump($updatedLines);
        return $updatedLines;
    }

    public function deleteChapterById($chapterId)
    {
        $sqlRequest = 'DELETE FROM chapter WHERE id = ?';
        $this->createQuery($sqlRequest, [$chapterId]);
    }
}

//AdminPassword;