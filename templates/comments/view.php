<?php if ($comments !== null) { ?>
  <?php foreach ($comments as $comment): ?>
    <tr>
      <td colspan="2" rowspan="1">
        <h3><?= $comment->getAuthor()->getNickname() ?></h3> <h4><?= $comment->getCreatedAt() ?></h4>
        <p><?= $comment->getText() ?></p>
      </td>
    </tr>
  <?php endforeach; ?>
<?php } ?>