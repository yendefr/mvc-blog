<?php if ($comments !== null) { ?>
  <?php foreach ($comments as $comment): ?>
    <tr>
      <td colspan="2" rowspan="1">
        <h3><?= $comment->getAuthor()->getNickname() ?></h3> <h4><?= $comment->getCreatedAt() ?></h4>
        <p><?= $comment->getText() ?></p> <br>

        <?php if ($comment->getAuthor()->getId() == $user->getId()) { ?>
          <a href="/Blog/www/articles/<?= $article->getId() ?>/comment/<?= $comment->getId() ?>/edit"><input type="submit" value="Изменить" class="submit"></a>
          <a href="/Blog/www/articles/<?= $article->getId() ?>/comment/<?= $comment->getId() ?>/delete"><input type="submit" value="Удалить" class="submit"></a>
        <?php } ?>
      </td>
    </tr>
  <?php endforeach; ?>
<?php } ?>