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
        $sqlRequest = 'SELECT * FROM chapter WHERE id = ?';
        $result = $this->createQuery($sqlRequest, [$chapterId]);
        $chapter = $result->fetch();
        $result->closeCursor();
        return $this->createObjectChapter($chapter);
    }

    public function getAllChapters()
    {
        $sqlRequest = 'SELECT * FROM chapter ORDER BY id ASC';
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
        // $chapterTitle = $chapter->getTitle();
        // $chapterContent = $chapter->getContent();
        // echo $chapterTitle . ' ' . $chapterContent;
        // $this->chapter($chapterTitle,$chapterContent);
        // var_dump($title, $content);
    //     extract($chapter);
    //     var_dump($chapter->getTitle());
    //     $sqlRequest = 'INSERT INTO chapter(chapter_title, chapter_content, create_Date) VALUES (:title, :content, NOW())';
    //     return $this->createQuery($sqlRequest, [$title, $content]);
    // }
}