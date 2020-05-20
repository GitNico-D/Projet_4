<?php

class BackController
{
    public function addArticle($post)
    {
        require '../view/addArticle.php';
        echo ('Page addArticle');
        var_dump ($this->articleManager);
        if(isset($_POST['submit']))
        {
            print('Clic');
            if (!(empty($_POST['title'])))
            {
                $newArticleManager = new ArticleManager(); 
                $newArticleManager->addNewArticle($post);
            }
            else 
            {
                print("Veuillez remplir les champs");
            }
            var_dump($newArticleManager);
        }
    }

}