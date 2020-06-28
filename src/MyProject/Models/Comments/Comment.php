<?php


namespace MyProject\Models\Comments;


use MyProject\Exceptions\InvalidArgumentException;
use MyProject\Models\ActiveRecordEntity;
use MyProject\Models\Articles\Article;
use MyProject\Models\Users\User;

class Comment extends ActiveRecordEntity
{
    /** @var string */
    protected $text;

    /** @var int */
    protected $articleId;

    /** @var int */
    protected $authorId;

    /** @var string */
    protected $createdAt;

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @return Article
     */
    public function getArticle(): Article
    {
        return Article::getById($this->articleId);
    }

    /**
     * @return User
     */
    public function getAuthor(): User
    {
        return User::getById($this->authorId);
    }

    /**
     * @return string
     */
    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    /**
     * @param string $text
     */
    public function setText(string $text): void
    {
        $this->text = $text;
    }

    /**
     * @param Article $article
     */
    public function setArticle(Article $article): void
    {
        $this->articleId = $article->getId();
    }

    /**
     * @param User $author
     */
    public function setAuthor(User $author): void
    {
        $this->authorId = $author->getId();
    }

    /**
     * @param string $createdAt
     */
    public function setCreatedAt(string $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    public static function createFromArray(array $fields, User $author, Article $article): Comment
    {
        if (empty($fields['text'])) {
            throw new InvalidArgumentException('Введите текст комментария');
        }

        $comment = new Comment();

        $comment->setText($fields['text']);
        $comment->setArticle($article);
        $comment->setAuthor($author);
        $article->setCreatedAt(date('Y-m-d H:i:s'));

        $comment->save();

        return $comment;
    }

    protected static function getTableName(): string
    {
        return 'comments';
    }
}