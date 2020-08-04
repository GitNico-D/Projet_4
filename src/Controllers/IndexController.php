<?php

namespace App\src\Controllers;

use App\src\Core\Controller;
use App\src\Managers\ChapterManager;

class IndexController extends Controller
{
    public $chapterManager;

    // public function __construct()
    // {
    //     $this->chapterManager = new ChapterManager;
    //     var_dump($this->chapterManager);
    // }

    /**
     * home
     *
     * @return void
     */
    public function home($isAdmin)
    {
        var_dump($isAdmin);
        $this->chapterManager = new ChapterManager();
        var_dump($this->chapterManager);
        echo $this->render('home_page.html.twig',
            ['publishedChaptersList' => $this->chapterManager->getAllPublishedChapters(),
            'unpublishedChaptersList' => $this->chapterManager->getAllUnpublishedChapters()]
            );
    }
}
