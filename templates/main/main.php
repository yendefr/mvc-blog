<?php include __DIR__ . '/../header.php'; ?>

<main>
  <section class="articles">
    <div class="wrapper">
      <?php foreach ($articles as $article): ?>
        <div class="article">
          <a href="articles/<?= $article->getId() ?>" class="title"><?= $article->getName() ?></a>

          <div class="article__text">
              <?= $parse->parse($article->getPreview()) ?>
          </div>

          <div class="article__info">
            <div class="item">
              <span>Автор: </span><a href=""><?= $article->getAuthor()->getNickname() ?></a>
            </div>
            <div class="item">
              <span><?= $article->getCreatedAt() ?></span>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </section>
</main>

<?php include __DIR__ . '/../footer.php'; ?>