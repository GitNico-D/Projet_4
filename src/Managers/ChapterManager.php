<?php

namespace App\src\Managers;

use App\src\Core\Manager;
use App\src\Models\Chapter;
use PDOStatement;

class ChapterManager extends Manager
{
    // public $table = 'chapter';

    /**
     * getChapterById
     *
     * @param mixed $chapterId
     * @return Chapter
     */
    // public function getChapterById($chapterId)
    // {
        // return new Chapter($this->findOneBy($this->table, array('id' => $chapterId)));
    //     return $this->findOneBy($this->table, array('id' => $chapterId));
    // }

    /**
     * getAllChapters
     *
     * @return array
     */
    // public function getAllChapters()
    // {
        // foreach ( as $chapter) {
        //     $allChaptersList [] = new Chapter($chapter);
        // }
        // return $this->findAll();
    // }

    /**
     * getAllPublishedChapters
     *
     * @return array
     */
    // public function getAllPublishedChapters()
    // {
        // foreach ( as $chapter) {
        //     $publishedChaptersList [] = new Chapter($chapter);
        // }
        // return $this->findBy($this->table, array('published' => true));
    // $publishedChaptersList;
    // }

    /**
     * getAllUnpublishedChapters
     *
     * @return array
     */
    // public function getAllUnpublishedChapters()
    // {
        // foreach ($this->findBy($this->table, array('published' => false)) as $chapter) {
        //     $unpublishedChaptersList [] = new Chapter($chapter);
        // }
        // return $this->findBy($this->table, array('published' => false));
    // }

    /**
     * publishedChapter
     *
     * @param mixed $chapterId
     * @return void
     */
    // public function publishedChapter(Chapter $publishChapter)
    // {
    //     return $this->update($publishChapter);
    // }

    /**
     * addChapterInDb
     *
     * @param mixed $newChapter
     * @return PDOStatement
     */
    // public function addChapterInDb(Chapter $newChapter)
    // {
    //     return $this->insertInto(
    //         $this->table,
    //        $newChapter
    //     );
    // }
    
    /**
     * updateChapterById
     *
     * @param Chapter $updatedChapter
     * @return void
     */
    // public function updateChapterById(Chapter $updatedChapter)
    // {
        // var_dump($updatedChapter);
    //     return $this->update($this->table, $updatedChapter);
    // }
 
    /**
     * deleteChapterById
     *
     * @param Chapter $deletedChapter
     * @return void
     */
    // public function deleteChapterById(Chapter $deleteChapter)
    // {
    //     var_dump($deleteChapter);
    //     return $this->delete($this->table, $deleteChapter);
    // }
}
