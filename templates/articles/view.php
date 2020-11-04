<?php include __DIR__ . '/../header.php'; ?>

<main>
    <section class="view-article">
        <div class="wrapper">
            <div class="view-article__box">
                <div class="view-article__title">
                    <h1><?= $article->getName() ?></h1>
                </div>

                <div class="view-article__text">
                  <span><?= $article->getText() ?></span>
                </div>

                <div class="article__bar">
                  <div class="article__info">
                    <div class="item">
                      <span>Автор: </span><a href=""><?= $article->getAuthor()->getNickname() ?></a>
                    </div>
                    <div class="item">
                      <span><?= $article->getCreatedAt() ?></span>
                    </div>
                  </div>

                  <?php if ($article->getAuthor()->getId() === $user->getId()): ?>
                    <div class="article__buttons">
                      <div class="item">
                        <a href="<?= $url ?>articles/<?= $article->getId() ?>/delete"><button class="view-article__button">Удалить</button></a>
                      </div>
                      <div class="item">
                        <a href="<?= $url ?>articles/<?= $article->getId() ?>/edit"><button class="view-article__button">Редактировать</button></a>
                      </div>
                    </div>
                  <?php endif; ?>

                </div>
            </div>
          <?php include_once __DIR__ . '/../comments/add.php'; ?>
          <?php include_once __DIR__ . '/../comments/view.php'; ?>
        </div>
    </section>
</main>

<?php include __DIR__ . '/../footer.php'; ?>