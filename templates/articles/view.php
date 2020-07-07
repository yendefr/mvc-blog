<?php include __DIR__ . '/../header.php'; ?>
  <h1><?= $article->getName() ?></h1>
  <p><?= $article->getText() ?></p>

  <p>Автор: <b><?php
          if ($article->getAuthor() !== null) {
            #TODO: Сделать профили пользователей и ссылки на них
            echo "<a href='user/'>".$article->getAuthor()->getNickname()."</a>";
          } else {
            echo "Пользователь удалён";
          }
          ?></b></p>
  <p>Дата создания: <b><?= $article->getCreatedAt() ?></b></p>

  <?php if ($article->getAuthor() !== null) { ?>
    <?php if ($article->getAuthor()->getId() == $user->getId()) { ?>
      <a href="<?= $article->getId() ?>/edit">Редактировать</a> <br>
      <a href="<?= $article->getId() ?>/delete">Удалить</a>
    <?php } ?>
  <?php } ?>
<?php include __DIR__ . '/../footer.php'; ?>