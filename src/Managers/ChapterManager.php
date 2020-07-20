<?php

namespace App\src\Managers;

use App\src\Core\Manager;
use App\src\Models\Chapter;

class ChapterManager extends Manager
{
    public $table = 'chapter';
    public $className = 'App\src\Models\Chapter';

    public function getChapterById($chapterId) 
    {
        $this->whereKey = 'id';
        return new Chapter($this->findOneBy($this->table, $this->whereKey, $chapterId));
    }

    public function getAllPublishedChapters()
    {
        $whereKey = 'published';
        $orderKey = 'id';
        $publishedChaptersList = $this->findAll($this->table, $whereKey, true, $orderKey, $this->className);
        return $publishedChaptersList;
    }

    public function getAllUnpublishedChapters()
    {
        $whereKey = 'published';
        $orderKey = 'id';
        $unpublishedChaptersList = $this->findAll($this->table, $whereKey, false, $orderKey, $this->className);
        return $unpublishedChaptersList;
    }

    public function publishedChapter($chapterId)
    {
        $sqlRequest = 'UPDATE chapter SET published= true WHERE id = ?';
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
        $sqlRequest = 'UPDATE chapter SET title= :updatedChapterTitle, content= :updatedChapterContent, updateDate = NOW(), published= :chapterPublished WHERE id = :chapterId';
        $updatedLines = $this->createQuery($sqlRequest, array(   
                'updatedChapterTitle' => $updatedChapterTitle,
                'updatedChapterContent' => $updatedChapterContent,
                'chapterPublished' => $chapterPublished,
                'chapterId' => $chapterId
                ));
        return $updatedLines;
    }

    public function deleteChapterById($chapterId)
    {
        $sqlRequest = 'DELETE FROM chapter WHERE id = ?';
        $this->createQuery($sqlRequest, [$chapterId]);
    }
}