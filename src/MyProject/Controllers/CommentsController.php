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

        header('Location: https://yendefr-blog.herokuapp.com/articles/' . $articleId, true, 302);
        exit();
    }

    public function edit(int $articleId, int $commentId): void
    {
        $article = Article::getById($articleId);
        $comment = Comment::getById($commentId);

        if ($article === null) {
            throw new NotFoundException();
        }

        if ($comment === null)
        {
            throw new NotFoundException();
        }

        if ($this->user === null)
        {
            throw new UnauthorizedException();
        }

        if (!empty($_POST))
        {
            try {
                $comment->update($_POST);
            } catch (InvalidArgumentException $e) {
                $this->view->renderHtml('comments/edit.php',
                    [
                        'error' => $e->getMessage(),
                        'comment' => $comment,
                    ]);
                return;
            }

            header('Location: https://yendefr-blog.herokuapp.com/articles/' . $article->getId(), true, 302);
            exit();
        }

        $this->view->renderHtml('comments/edit.php', [
            'article' => $article,
            'comment' => $comment,
        ]);

    }

    public function remove(int $articleId, int $commentId): void
    {
        $article = Article::getById($articleId);
        $comment = Comment::getById($commentId);

        if ($article === null) {
            throw new NotFoundException();
        }

        if ($comment === null)
        {
            throw new NotFoundException();
        }

        if ($this->user === null)
        {
            throw new UnauthorizedException();
        }

        $comment->delete();

        header('Location: https://yendefr-blog.herokuapp.com/articles/' . $article->getId());
    }
}