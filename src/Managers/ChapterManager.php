<?php

namespace App\src\Managers;

use App\src\Core\Manager;
use App\src\Models\Chapter;

class ChapterManager extends Manager
{
    public $table = 'chapter';

    /**
     * getChapterById
     *
     * @param mixed $chapterId
     * @return Chapter
     */
    public function getChapterById($chapterId)
    {
        return $this->findOneBy($this->table, array('id' => $chapterId));
    }

    /**
     * getAllChapters
     *
     * @return array of Chapter
     */
    public function getAllChapters()
    {
        return $this->findAll($this->table);
    }

    /**
     * getAllPublishedChapters
     *
     * @return array of Chapter
     */
    public function getAllPublishedChapters()
    {
        return $this->findBy($this->table, array('published' => true));
    }

    /**
     * getAllUnpublishedChapters
     *
     * @return array of Chapter
     */
    public function getAllUnpublishedChapters()
    {
        return $this->findBy($this->table, array('published' => false));
    }

    /**
     * publishedChapter
     *
     * @param mixed $chapterId
     * @return void
     */
    public function publishedChapter($chapterId)
    {
        return $this->update($this->table, array('published' => true), array('id' => $chapterId));
    }

    /**
     * addChapterInDb
     *
     * @param mixed $newChapterAuthor
     * @param mixed $newChapterTitle
     * @param mixed $newChapterContent
     * @param mixed $chapterCreateDate
     * @param mixed $chapterPublished
     * @param mixed $newChapterImg
     * @return void
     */
    public function addChapterInDb($newChapterAuthor, $newChapterTitle, $newChapterContent, $chapterCreateDate, $chapterPublished, $newChapterImg)
    {
        return $this->insertInto(
            $this->table,
            array('author' => $newChapterAuthor, 'title' => $newChapterTitle, 'content' => $newChapterContent,
                 'createDate' => $chapterCreateDate, 'updateDate' => $chapterCreateDate, 'published' => $chapterPublished,
                 'imgUrl' => $newChapterImg));
    }
    /**
     * updateChapterById
     *
     * @param mixed $updatedChapterTitle
     * @param mixed $updatedChapterContent
     * @param mixed $updatedChapterDate
     * @param mixed $chapterPublished
     * @param mixed $updatedChapterImg
     * @param mixed $chapterId
     * @return void
     */
    public function updateChapterById($updatedChapterTitle, $updatedChapterContent, $updatedChapterDate, $chapterPublished, $updatedChapterImg, $chapterId)
    {
        return $this->update(
            $this->table,
            array('title' => $updatedChapterTitle, 'content' => $updatedChapterContent,'updateDate' => $updatedChapterDate,
                'published' => $chapterPublished, 'imgUrl' => $updatedChapterImg),
            array('id' => $chapterId));
    }
 
    /**
     * deleteChapterById
     *
     * @param mixed $chapterId
     * @return void
     */
    public function deleteChapterById($chapterId)
    {
        return $this->delete($this->table, array('id' => $chapterId));
    }
}
