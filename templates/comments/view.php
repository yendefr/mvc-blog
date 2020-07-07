<?php if ($comments !== null) { ?>
  <?php foreach ($comments as $comment): ?>
    <tr>
      <td colspan="2" rowspan="1">
        <h3><?php
            if ($comment->getAuthor() !== null) {
              #TODO: Сделать профили пользователей и ссылки на них
              echo "<a href='user/'>".$comment->getAuthor()->getNickname()."</a>";
            } else {
              echo "Пользователь удалён";
            }
        ?></h3>
        <h4><?= $comment->getCreatedAt() ?></h4>
        <p><?= $comment->getText() ?></p> <br>

        <?php if ($comment->getAuthor() !== null) { ?>
          <?php if ($comment->getAuthor()->getId() == $user->getId()) { ?>
            <a href="articles/<?= $article->getId() ?>/comment/<?= $comment->getId() ?>/edit"><input type="submit" value="Изменить" class="submit"></a>
            <a href="articles/<?= $article->getId() ?>/comment/<?= $comment->getId() ?>/delete"><input type="submit" value="Удалить" class="submit"></a>
          <?php } ?>
        <?php } ?>
      </td>
    </tr>
  <?php endforeach; ?>
<?php } ?>