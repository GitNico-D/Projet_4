<?php

namespace App\src\DAO;

use App\src\model\Chapter;

class ChapterManager extends DAO
{
    private $chapter;

    // public function __construct(array $data)
    // {
    //     $this->chapter = new chapter($data);
    //     var_dump($this->chapter);
    //     return $this->chapter;
    // }

    public function createObjectChapter(array $data)
    {
        $chapter = new Chapter($data);
        // $chapter->setId($data['id']);
        // $chapter->setTitle($data['title']);
        // $chapter->setAuthor($data['author']);
        // $chapter->setContent($data['content']);
        // $chapter->setCreationDate($data['creationDate']);
        return $chapter;
    }

    public function getChapterById($chapterId) 
    {
        $sqlRequest = 'SELECT * FROM chapter WHERE chapterId = ?';
        $result = $this->createQuery($sqlRequest, [$chapterId]);
        $chapter = $result->fetch();
        $result->closeCursor();
        return $this->createObjectChapter($chapter);
    }

    public function getAllChapters()
    {
        $sqlRequest = 'SELECT * FROM chapter ORDER BY chapterId ASC';
        $result = $this->createQuery($sqlRequest);
        $chaptersList = [];
        foreach ($result as $chapter)
        {
            $chaptersList [] = $this->createObjectChapter($chapter);
        }
        $result->closeCursor(); 
        return $chaptersList;
    }

    // public function addNewChapter(Chapter $chapter)
    // {
    //     var_dump($chapterTitle, $chapterAuthor, $chapterContent);
    //     extract($chapter);
    //     $sqlRequest = 'INSERT INTO chapter (chapterTitle, chapterAuthor, chapterContent, chapterCreateDate, chapterUpdateDate) VALUES (?, ?, ?, NOW(), NOW())';
    //     $this->createQuery($sqlRequest, array(
    //         'chapterTitle' => $chapterTitle, $chapterAuthor, $chapterContent));
    //     // var_dump($sqlRequest);
    //     return $this->getChapterById($chapterId);
    // }

    public function addChapterInDb($newChapterTitle, $newChapterContent, $newChapterAuthor)
    {
        // echo $chapterTitle . ' ' . $chapterContent;
        // $this->chapter($chapterTitle,$chapterContent);
        // var_dump($chapterTitle, $chapterAuthor, $chapterContent);
        $sqlRequest = 'INSERT INTO chapter (chapterTitle, chapterAuthor, chapterContent, chapterCreateDate, chapterUpdateDate) VALUES (:chapterTitle, :chapterAuthor, :chapterContent, NOW(), NOW())';
        var_dump($sqlRequest);
        $affectedLines = $this->createQuery($sqlRequest, array(
            'chapterTitle' => $newChapterTitle, 
            'chapterAuthor' => $newChapterAuthor, 
            'chapterContent' => $newChapterContent));
        var_dump($affectedLines);
        return $affectedLines;
    }
}