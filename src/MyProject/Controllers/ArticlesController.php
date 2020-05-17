<?php

namespace MyProject\Controllers;

use MyProject\Models\Articles\Article;
use MyProject\Services\Db;
use MyProject\View\View;

class ArticlesController
{
    /** @var View */
    private $view;

    /** @var Db */
    private $db;

    public function __construct()
    {
        $this->view = new View(__DIR__.'/../../../templates');
        $this->db = new Db();
    }

    /**
     * Отображает страницу отдельно взятой статьи
     */
    public function view(int $articleId)
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

}