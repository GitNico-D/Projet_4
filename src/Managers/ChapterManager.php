<?php

namespace App\src\Managers;

use App\src\Core\Manager;
use App\src\Models\Chapter;

class ChapterManager extends Manager
{
    public $table = 'chapter';

    public function getChapterById($chapterId)
    {
        return new Chapter($this->findOneBy($this->table, array('id' => $chapterId)));
    }

    public function getAllChapters()
    {
        $allChaptersList = $this->findAll($this->table);
        return $allChaptersList;
    }

    public function getAllPublishedChapters()
    {
        $publishedChaptersList = $this->findBy($this->table, array('published' => 1), array('createDate' => 'ASC'));
        return $publishedChaptersList;
    }

    public function getAllUnpublishedChapters()
    {
        $unpublishedChaptersList = $this->findBy($this->table, array('published' => 0), array('createDate' => 'ASC'), 10);
        return $unpublishedChaptersList;
    }

    public function publishedChapter($chapterId)
    {
        $sqlRequest = 'UPDATE chapter SET published= true WHERE id = ?';
        $this->createQuery($sqlRequest, [$chapterId]);
    }

    public function addChapterInDb($newChapterAuthor, $newChapterTitle, $newChapterContent, $chapterPublished, $newChapterImg)
    {
        $sqlRequest = 'INSERT INTO chapter (author, title, content, createDate, updateDate, published, imgUrl) VALUES (:chapterAuthor, :chapterTitle, :chapterContent, NOW(), NOW(), :chapterPublished, :chapterImg)';
        $affectedLines = $this->createQuery($sqlRequest, array(
            'chapterAuthor' => $newChapterAuthor,
            'chapterTitle' => $newChapterTitle,
            'chapterContent' => $newChapterContent,
            'chapterPublished' => $chapterPublished,
            'chapterImg' => $newChapterImg
        ));
        return $affectedLines;
    }

    public function updateChapterById($updatedChapterTitle, $updatedChapterContent, $chapterPublished, $updatedChapterImg, $chapterId)
    {
        $sqlRequest = 'UPDATE chapter SET title= :updatedChapterTitle, content= :updatedChapterContent, updateDate = NOW(), published= :chapterPublished, imgUrl= :updatedChapterImg WHERE id = :chapterId';
        $updatedLines = $this->createQuery($sqlRequest, array(
                'updatedChapterTitle' => $updatedChapterTitle,
                'updatedChapterContent' => $updatedChapterContent,
                'chapterPublished' => $chapterPublished,
                'updatedChapterImg' => $updatedChapterImg,
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
