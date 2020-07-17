<?php include __DIR__ . '/../newHeader.php'; ?>

<main>
    <section class="view-article">
        <div class="wrapper">
            <div class="view-article__box">
                <div class="article__title">
                    <h1 class="article__title"><?= $article->getName() ?></h1>
                </div>
                <div class="article__text">
                  <span><?= $article->getText() ?></span>
                </div>

            </div>
        </div>
    </section>
</main>

<?php include __DIR__ . '/../newFooter.php'; ?>