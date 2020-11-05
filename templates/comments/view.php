<?php if ($comments !== null): ?>
  <?php foreach ($comments as $comment): ?>
    <div class="comment">
      <div class="comment__info">
        <div class="item">
          <a href=""><?= $comment->getAuthor()->getNickname() ?></a>
        </div>
        <div class="item">
          <span><?= $comment->getCreatedAt() ?></span>
        </div>
      </div>

      <div class="comment__text">
          <?= $parse->parse($comment->getText()) ?>
      </div>
    </div>
  <?php endforeach; ?>
<?php endif ?>
