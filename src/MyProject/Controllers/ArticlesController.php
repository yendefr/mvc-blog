<?php

namespace MyProject\Controllers;

use MyProject\Models\Articles\Article;
use MyProject\View\View;

class ArticlesController
{
    /** @var View */
    private $view;


    public function __construct()
    {
        $this->view = new View(__DIR__.'/../../../templates');
    }

    /**
     * Отображает страницу отдельно взятой статьи
     */
    public function view(int $articleId): void
    {
        // Объект класса Article, свойства которого заполнены данными из БД
        $article = Article::getById($articleId);

        if ($article === null)
        {
            $this->view->renderHtml('errors/404.php', [], 404);
            return;
        }

        $this->view->renderHtml('articles/view.php', [
            'article' => $article,
        ]);
    }

    public function edit(int $articleId): void
    {
        $article = Article::getById($articleId);

        if ($article === null)
        {
            $this->view->renderHtml('errors/404.php', [], 404);
            return;
        }

        $article->setName('LalaName');
        $article->setText('LalalalaText');

        $article->save();
    }
}