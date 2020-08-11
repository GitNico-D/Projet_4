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
        var_dump(file_exists("App\src\Models\Chapter.php"));
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
        var_dump($newChapter);
        // $parameters = [];
        // foreach($newChapter as $insertKey => $insertValue)
        // {
        //     $parameters [$insertKey] = $newChapter->"get". $insertValue();
        // }
        // var_dump($parameters);
        // return $this->insertInto($this->table, $newChapter
            // array('author' => $newChapter->getAuthor(), 'title' => $newChapter->getTitle(), 'content' => $newChapter->getContent(),
            //      'createDate' => $newChapter->getCreateDate(), 'updateDate' => $newChapter->getCreateDate(), 'published' => $newChapter->getPublished(),
            //      'imgUrl' => $newChapter->getImgUrl())
        // );
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
            array('id' => $chapterId)
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
        return $this->delete($this->table, array('id' => $chapterId));
    }
}
