<?php

namespace MyProject\Controllers;

use MyProject\Models\Articles\Article;
use MyProject\Models\Users\User;
use MyProject\View\View;
use PhpMyAdmin\Header;

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

    public function add(): void
    {
        date_default_timezone_set('Asia/Tomsk');

        $author = User::getById(1);
        $article = new Article();
        $article->setAuthor($author);
        $article->setName('Новое имя');
        $article->setText('Новый текст');
        $article->setCreatedAt(date('Y-m-d H:i:s'));

        $article->save();

        var_dump($article);
    }

    public function edit(int $articleId): void
    {
        $article = Article::getById($articleId);

        if ($article === null)
        {
            $this->view->renderHtml('errors/404.php', [], 404);
            return;
        }

        $article->setName('Изменённый заголовок');
        $article->setText('Изменённый текст статьи');

        $article->save();
    }

    public function remove(int $articleId): void
    {
        $article = Article::getById($articleId);
        $article->delete();

        \header('Location: http://localhost/Blog/www/');
    }
}