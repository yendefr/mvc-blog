<?php include __DIR__ . '/../newHeader.php'; ?>

<main>
  <section class="articles">
    <div class="wrapper">
      <?php foreach ($articles as $article): ?>
        <div class="article">
          <div class="article__title">
            <a href="www/articles/<?= $article->getId() ?>" class="title"><?= $article->getName() ?></a>
          </div>

          <div class="article__text">
            <span><?= $article->getText() ?></span>
          </div>

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
    </div>
  </section>
</main>

<?php include __DIR__ . '/../newFooter.php'; ?>