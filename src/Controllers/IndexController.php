<?php

namespace App\src\Controllers;

use App\src\Core\Controller;
use App\src\Managers\ChapterManager;
use Exception;

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
     * @param $isAdmin
     * @return void
     * @throws Exception
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
