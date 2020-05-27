<?php

namespace MyProject\Controllers;

use MyProject\Exceptions\InvalidArgumentException;
use MyProject\Exceptions\NotFoundException;
use MyProject\Exceptions\UnauthorizedException;
use MyProject\Models\Articles\Article;
use MyProject\Models\Users\User;

class ArticlesController extends AbstractController
{
    /**
     * Отображает страницу отдельно взятой статьи
     */
    public function view(int $articleId): void
    {
        # Если пользователь не авторизован, он будет перенаправлен на страницу с предложением войти в аккаунт
        if ($this->user === null) {
            throw new UnauthorizedException();
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

        if ($this->user === null) {
            throw new UnauthorizedException();
        }

        if (!empty($_POST))
        {
            try {
                $article = Article::createFromArray($_POST, $this->user);
            } catch (InvalidArgumentException $e) {
                $this->view->renderHtml('articles/add.php', ['error' => $e->getMessage()]);
                return;
            }

            header('Location: /Blog/www/articles/' . $article->getId(), true, 302);
            exit();
        }

        $this->view->renderHtml('articles/add.php');
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