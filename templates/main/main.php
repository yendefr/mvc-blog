<?php include __DIR__ . '/../header.php'; ?>

<main>
  <section class="articles">
    <div class="wrapper">
      <?php foreach ($articles as $article): ?>
        <div class="article">
<!--          <div class="article__title">-->
            <a href="articles/<?= $article->getId() ?>" class="title"><?= $article->getName() ?></a>
<!--          </div>-->

          <div class="article__text">
            <span>
                <?php
                  $text = $article->getText();
                  if (strlen($text) > 700) {
                    $text = substr($text, 0, 550);
                    $text = explode(' ', $text);
                    array_pop($text);
                    echo implode(' ', $text) . '...';
                  } else {
                    echo $text;
                  }
                ?>
            </span>
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

<?php include __DIR__ . '/../footer.php'; ?>