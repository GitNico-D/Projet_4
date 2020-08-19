<?php

namespace App\src\Controllers;

use App\src\Core\Controller;
use App\src\Managers\ChapterManager;

class IndexController extends Controller
{
    public $chapterManager;

    public function __construct()
    {
        parent::__construct();
        $this->chapterManager = new ChapterManager;
    }

    /**
     * home
     *
     * @return void
     */
    public function home($isAdmin)
    {
        // var_dump($this->manager);
        echo $this->render(
            'home_page.html.twig',
            ['publishedChaptersList' => $this->chapterManager->findBy(array('published' => true)),
            'isAdmin' => $isAdmin]
        );
    }
}
