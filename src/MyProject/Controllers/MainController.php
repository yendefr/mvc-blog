<?php

namespace MyProject\Controllers;

use MyProject\Models\Articles\Article;

use MyProject\View\View;

class MainController extends AbstractController
{
    /**
     * Отображает главную страницу со списоком статей
     */
    public function main()
    {
        $articles = Article::findAll();
        $this->view->renderHtml('main/main.php', ['articles' => $articles]);
    }
}