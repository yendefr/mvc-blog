<?php include __DIR__ . '/../newHeader.php'; ?>

<main>
    <section class="add-article">
        <div class="wrapper">
            <div class="add-article__box">
                <div class="add-article__title">
                    <h1>Новая статья</h1>
                </div>

                <?php if (! empty($error)): ?>
                  <p class="error"><?= $error ?></p>
                <?php endif; ?>

                <form action="www/add" method="post">
                    <div class="add-article__input-name">
                        <label for="name" class="add-article__input-name__label">Название</label> <br>
                        <input type="text" name="name" id="name" value="<?= $_POST['name'] ?? '' ?>" class="input__article-name">
                    </div>
                    <div class="add-article__input-text">
                        <label for="text" class="add-article__input-text__label">Текст</label> <br>
                        <textarea name="text" id="text" class="input__article-text"><?= $_POST['text'] ?? '' ?></textarea>
                    </div>
                    <div class="add-article__button-create">
                        <input type="submit" value="Создать" class="submit">
                    </div>
                </form>
            </div>
        </div>
    </section>
</main>

<?php include __DIR__ . '/../newFooter.php'; ?>




    <h1>Создание новой статьи</h1>
    <?php if (! empty($error)): ?>
      <p class="error"><?= $error ?></p>
    <?php endif; ?>
    <form action="www/add" method="post">
        <label for="name">Название статьи</label><br>
        <input type="text" name="name" id="name" value="<?= $_POST['name'] ?? '' ?>" size="50"><br>
        <br>
        <label for="text">Текст статьи</label><br>
        <textarea name="text" id="text" rows="10" cols="80"><?= $_POST['text'] ?? '' ?></textarea><br>
        <br>
        <input type="submit" value="Создать" class="submit">
    </form>