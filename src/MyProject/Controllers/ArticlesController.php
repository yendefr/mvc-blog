<?php

namespace MyProject\Controllers;

use MyProject\Exceptions\NotFoundException;
use MyProject\Models\Articles\Article;
use MyProject\Models\Users\User;

class ArticlesController extends AbstractController
{
    /**
     * Отображает страницу отдельно взятой статьи
     */
    public function view(int $articleId): void
    {
        # Если пользователь не авторизован, он будет перенаправлен на страницу входа
        if ($this->user === null)
        {
            echo 'Null';
            header('Location: /Blog/www/login');
            return;
        }

        // Объект класса Article, свойства которого заполнены данными из БД
        $article = Article::getById($articleId);

        if ($article === null)
        {
            throw new NotFoundException();
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
            throw new NotFoundException();
        }

        $article->setName('Изменённый заголовок');
        $article->setText('Изменённый текст статьи');

        $article->save();
    }

    public function remove(int $articleId): void
    {
        $article = Article::getById($articleId);

        if ($article === null)
        {
            throw new NotFoundException();
        }

        $article->delete();

        \header('Location: http://localhost/Blog/www/');
    }
}