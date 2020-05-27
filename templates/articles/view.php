<?php include __DIR__ . '/../header.php'; ?>
    <h1><?= $article->getName() ?></h1>
    <p><?= $article->getText() ?></p>
    <p>Автор: <b><?= $article->getAuthor()->getNickname() ?></b></p>
    <p>Дата создания: <b><?= $article->getCreatedAt() ?></b></p>
    <a href="http://localhost/Blog/www/articles/<?= $article->getId() ?>/delete">Удалить запись</a>
<?php include __DIR__ . '/../footer.php'; ?>