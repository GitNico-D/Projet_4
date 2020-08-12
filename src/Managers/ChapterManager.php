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
     * @return void
     */
    public function getChapterById($chapterId)
    {
        // $newChapter = new Chapter;
        // var_dump($this->findOneBy($this->table, array('id' => $chapterId)));
        return new Chapter($this->findOneBy($this->table, array('id' => $chapterId)));
    }

    /**
     * getAllChapters
     *
     * @return array
     */
    public function getAllChapters()
    {
        //  $this->findAll($this->table);
        foreach($this->findAll($this->table) as $chapter)
        {
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
        // $file = '..\src\Models\Chapter.php';
        // var_dump($file);
        // var_dump(file_exists($file));
        // return $this->findBy($this->table, array('published' => true));
        foreach($this->findBy($this->table, array('published' => true)) as $chapter)
        {
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
        // return $this->findBy($this->table, array('published' => false));
        foreach($this->findBy($this->table, array('published' => false)) as $chapter)
        {
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
     * @param mixed $newChapterAuthor
     * @param mixed $newChapterTitle
     * @param mixed $newChapterContent
     * @param mixed $chapterCreateDate
     * @param mixed $chapterPublished
     * @param mixed $newChapterImg
     * @return PDOStatement|void
     */
    public function addChapterInDb($newChapter)
    {
        var_dump(extract($newChapter));
        return $this->insertInto($this->table, 
            array('author' => $newChapter->getAuthor(), 'title' => $newChapter->getTitle(), 'content' => $newChapter->getContent(),
                 'createDate' => $newChapter->getCreateDate(), 'updateDate' => $newChapter->getCreateDate(), 'imgUrl' => $newChapter->getImgUrl())
        );
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
    public function updateChapterById($updatedChapter)
    {
        // var_dump($updatedChapter);
        // return $this->update(
        //     $this->table,
        //     array('title' => $updatedChapter->getTitle(), 'content' => $updatedChapter->getContent(),'updateDate' => $updatedChapter->getUpdateDate(),
        //         'published' => $updatedChapter->getPublished(), 
        //         // 'imgUrl' => $updatedChapter->getImgUrl()
        //     ),
        //     array('id' => $updatedChapter->getId())
        // );
    }
 
    /**
     * deleteChapterById
     *
     * @param mixed $chapterId
     * @return void
     */
    public function deleteChapterById($deletedChapter)
    {
        return $this->delete($this->table, array('id' => $deletedChapter->getId()));
    }
}
