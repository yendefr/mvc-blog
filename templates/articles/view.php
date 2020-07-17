<?php include __DIR__ . '/../newHeader.php'; ?>

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
                    <div class="article__item">
                      <span>Автор: </span><a href=""><?= $article->getAuthor()->getNickname() ?></a>
                    </div>
                    <div class="article__item">
                      <span><?= $article->getCreatedAt() ?></span>
                    </div>
                  </div>

                  <div class="article__buttons">
                    <div class="article__item">
                      <a href="/articles/<?= $article->getId() ?>/delete"><button class="view-article__button">Удалить</button></a>
                    </div>
                    <div class="article__item">
                      <a href="/articles/<?= $article->getId() ?>/edit"><button class="view-article__button">Редактировать</button></a>
                    </div>
                  </div>
                </div>
                <!-- Добавить кнопки удаления/редактирования итд -->

            </div>
        </div>
    </section>
</main>

<?php include __DIR__ . '/../newFooter.php'; ?>