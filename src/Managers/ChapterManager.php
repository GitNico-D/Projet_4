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

    
    // public function getAllPublishedChapters()
    // {
    //     // $publishedChaptersList = $this->findBy($this->table, array('published' => 1), array('createDate' => 'ASC'));
    //     $sqlRequest = 'SELECT * FROM chapter WHERE published = ? ORDER BY createDate ASC';
    //     var_dump($sqlRequest);

    //     $result = $this->createQuery($sqlRequest, ['published' => 1]);
    //     var_dump($result);
    //     $publishedChaptersList = [];
    //     // $entity = 'App\src\Models\\' . ucfirst($table);
    //     foreach ($result as $data) {
    //         var_dump($data);
    //         $publishedChaptersList [] = new Chapter($data);
    //     }
    //     $result->closeCursor();
    //     var_dump($publishedChaptersList);
    //     return $publishedChaptersList;
    // }

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

    public function addChapterInDb($newChapterAuthor, $newChapterTitle, $newChapterContent, $chapterCreateDate, $chapterPublished, $newChapterImg)
    {
        $insertLines = $this->insertInto($this->table, 
            array('author', 'title', 'content', 'createDate', 'updateDate', 'published', 'imgUrl'),
            array('chapterAuthor' => $newChapterAuthor, 
                'chapterTitle' => $newChapterTitle,
                'chapterContent' => $newChapterContent,
                'chapterCreateDate' => $chapterCreateDate,
                'chapterUpdateDate' => $chapterCreateDate,
                'chapterPublished' => $chapterPublished,
                'chapterImg' => $newChapterImg
                ));
        return $insertLines;
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

    public function updateChapterById($updatedChapterTitle, $updatedChapterContent, $updatedChapterDate, $chapterPublished, $updatedChapterImg, $chapterId)
    {
        $updatedLines = $this->update($this->table, 
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
        return $updatedLines;
    }

    

    public function deleteChapterById($chapterId)
    {
        $sqlRequest = 'DELETE FROM chapter WHERE id = ?';
        $this->createQuery($sqlRequest, [$chapterId]);
    }
}
