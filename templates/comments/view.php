<?php if ($comments !== null) { ?>
  <?php foreach ($comments as $comment): ?>
    <tr>
      <td colspan="2" rowspan="1">
        <p><?= $comment->getText() ?></p>
      </td>
    </tr>
  <?php endforeach; ?>
<?php } ?>