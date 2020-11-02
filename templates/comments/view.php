<?php if ($comments !== null): ?>
  <?php foreach ($comments as $comment): ?>
    <div class="comment">
      <div class="article__bar">
        <div class="article__info">
          <div class="article__item">
            <span>Автор: </span><a href=""><?= $article->getAuthor()->getNickname() ?></a>
          </div>
          <div class="article__item">
            <span><?= $article->getCreatedAt() ?></span>
          </div>
        </div>
    </div>
  <?php endforeach; ?>
<?php endif ?>
