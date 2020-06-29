<?php


namespace MyProject\Controllers;


use MyProject\Exceptions\InvalidArgumentException;
use MyProject\Exceptions\NotFoundException;
use MyProject\Exceptions\UnauthorizedException;
use MyProject\Models\Articles\Article;
use MyProject\Models\Comments\Comment;

class CommentsController extends AbstractController
{
    public function add(int $articleId): void
    {
        $article = Article::getById($articleId);

        if ($this->user === null) {
            throw new UnauthorizedException();
        }

        if ($article === null) {
            throw new NotFoundException();
        }

        if (!empty($_POST))
        {
            try {
                $comment = Comment::createFromArray($_POST, $this->user, $article);
            } catch (InvalidArgumentException $e) {
                $this->view->renderHtml('articles/view.php', [
                    'article' => $article,
                    'error' => $e->getMessage(),
                ]);
            }
        }

        header('Location: /Blog/www/articles/' . $articleId, true, 302);
        exit();
    }
}