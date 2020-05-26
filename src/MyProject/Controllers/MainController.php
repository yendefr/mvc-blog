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
        # Если пользователь не авторизован, он будет перенаправлен на страницу входа
        if ($this->user === null)
        {
            echo 'Null';
            header('Location: /Blog/www/login');
            return;
        }

        $articles = Article::findAll();
        $this->view->renderHtml('main/main.php', ['articles' => $articles]);
    }
}