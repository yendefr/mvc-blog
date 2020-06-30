<?php include __DIR__ . '/../header.php'; ?>
  <h1><?= $article->getName() ?></h1>
  <p><?= $article->getText() ?></p>
  <p>Автор: <b><?= $article->getAuthor()->getNickname() ?></b></p>
  <p>Дата создания: <b><?= $article->getCreatedAt() ?></b></p>

  <?php if ($article->getAuthor()->getId() == $user->getId()) { ?>
    <a href="/Blog/www/articles/<?= $article->getId() ?>/edit">Редактировать</a> <br>
    <a href="/Blog/www/articles/<?= $article->getId() ?>/delete">Удалить</a>
  <?php } ?>
<?php include __DIR__ . '/../footer.php'; ?>