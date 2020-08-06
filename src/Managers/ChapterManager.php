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
        return $this->findBy($this->table, array('published' => 0));
    }

    /**
     * publishedChapter
     *
     * @param mixed $chapterId
     * @return void
     */
    public function publishedChapter($chapterId)
    {
        $sqlRequest = 'UPDATE chapter SET published= true WHERE id = ?';
        $this->createQuery($sqlRequest, [$chapterId]);
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
    // public function addChapterInDb($newChapterAuthor, $newChapterTitle, $newChapterContent, $chapterCreateDate, $chapterPublished, $newChapterImg)
    // {
    //     return $this->insertInto(
    //         $this->table,
    //         array('author', 'title', 'content', 'createDate', 'updateDate', 'published', 'imgUrl'),
    //         array('chapterAuthor' => $newChapterAuthor,
    //             'chapterTitle' => $newChapterTitle,
    //             'chapterContent' => $newChapterContent,
    //             'chapterCreateDate' => $chapterCreateDate,
    //             'chapterUpdateDate' => $chapterCreateDate,
    //             'chapterPublished' => $chapterPublished,
    //             'chapterImg' => $newChapterImg
    //             )
    //     );
    // }

    public function addChapterInDb($newChapterAuthor, $newChapterTitle, $newChapterContent, $chapterCreateDate, $chapterPublished, $newChapterImg)
    {
        return $this->insertInto(
            $this->table,
            array('author', 'title', 'content', 'createDate', 'updateDate', 'published', 'imgUrl'),
            array($newChapterAuthor, $newChapterTitle, $newChapterContent, $chapterCreateDate, $chapterCreateDate, $chapterPublished, $newChapterImg));
    }

    // public function updateChapterById($updatedChapterTitle, $updatedChapterContent, $chapterPublished, $updatedChapterImg, $chapterId)
    // {
    //     $sqlRequest = 'UPDATE chapter SET title= :updatedChapterTitle, content= :updatedChapterContent, updateDate = NOW(), published= :chapterPublished, imgUrl= :updatedChapterImg WHERE id = :chapterId';
    //     $updatedLines = $this->createQuery($sqlRequest, array(
    //             'updatedChapterTitle' => $updatedChapterTitle,
    //             'updatedChapterContent' => $updatedChapterContent,
    //             'chapterPublished' => $chapterPublished,
    //             'updatedChapterImg' => $updatedChapterImg,
    //             'chapterId' => $chapterId
    //             ));
    //     return $updatedLines;
    // }

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
            array('title' => 'updatedChapterTitle',
                    'content' => 'updatedChapterContent',
                    'updateDate' => 'updatedChapterDate',
                    'published' => 'chapterPublished',
                    'imgUrl' => 'updatedChapterImg'),
            array('updatedChapterTitle' => $updatedChapterTitle,
                    'updatedChapterContent' => $updatedChapterContent,
                    'updatedChapterDate' => $updatedChapterDate,
                    'chapterPublished' => $chapterPublished,
                    'updatedChapterImg' => $updatedChapterImg),
            array('chapterId' => $chapterId)
        );
    }
 

    /**
     * deleteChapterById
     *
     * @param mixed $chapterId
     * @return void
     */
    public function deleteChapterById($chapterId)
    {
        // $sqlRequest = 'DELETE FROM chapter WHERE id = ?';
        // $this->createQuery($sqlRequest, [$chapterId]);
        $this->delete($this->table, array('id' => $chapterId));
    }
}
