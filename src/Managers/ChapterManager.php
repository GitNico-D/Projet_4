<?php

namespace App\src\Managers;

use App\src\Core\Manager;
use App\src\Models\Chapter;
use PDOStatement;

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
        return new Chapter($this->findOneBy($this->table, array('id' => $chapterId)));
    }

    /**
     * getAllChapters
     *
     * @return array
     */
    public function getAllChapters()
    {
        foreach ($this->findAll($this->table) as $chapter) {
            $allChaptersList [] = new Chapter($chapter);
        }
        return $allChaptersList;
    }

    /**
     * getAllPublishedChapters
     *
     * @return array
     */
    public function getAllPublishedChapters()
    {
        foreach ($this->findBy($this->table, array('published' => true)) as $chapter) {
            $publishedChaptersList [] = new Chapter($chapter);
        }
        return $publishedChaptersList;
    }

    /**
     * getAllUnpublishedChapters
     *
     * @return array
     */
    public function getAllUnpublishedChapters()
    {
        foreach ($this->findBy($this->table, array('published' => false)) as $chapter) {
            $unpublishedChaptersList [] = new Chapter($chapter);
        }
        return $unpublishedChaptersList;
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
     * @param mixed $newChapter
     * @return PDOStatement
     */
    public function addChapterInDb(Chapter $newChapter)
    {
        return $this->insertInto(
            $this->table,
            array('author' => $newChapter->getAuthor(), 'title' => $newChapter->getTitle(), 'content' => $newChapter->getContent(),
                 'createDate' => $newChapter->getCreateDate(), 'updateDate' => $newChapter->getCreateDate(), 'imgUrl' => $newChapter->getImgUrl())
        );
    }
    
    /**
     * updateChapterById
     *
     * @param Chapter $updatedChapter
     * @return void
     */
    public function updateChapterById(Chapter $updatedChapter)
    {
        var_dump($updatedChapter);
        return $this->update(
            $this->table,
            array('title' => $updatedChapter->getTitle(), 'content' => $updatedChapter->getContent(),'updateDate' => $updatedChapter->getUpdateDate(),
                'published' => $updatedChapter->getPublished(), 'imgUrl' => $updatedChapter->getImgUrl()
            ),
            array('id' => $updatedChapter->getId())
        );
    }
 
    /**
     * deleteChapterById
     *
     * @param Chapter $deletedChapter
     * @return void
     */
    public function deleteChapterById(Chapter $deletedChapter)
    {
        return $this->delete($this->table, array('id' => $deletedChapter->getId()));
    }
}
