<?php

namespace App\src\Controllers;

use App\src\Core\Controller;

class IndexController extends Controller
{
    /**
     * home
     *
     * @return void
     */
    public function home()
    {
        echo $this->twig->render('home_page.html.twig', 
            ['publishedChaptersList' => $this->chapterManager->getAllPublishedChapters(),
            'unpublishedChaptersList' => $this->chapterManager->getAllUnpublishedChapters()]
        );
    }

}