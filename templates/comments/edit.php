<?php include __DIR__ . '/../header.php'; ?>
    <h1>Редактирование комментария</h1>
<?php if (! empty($error)): ?>
    <p class="error"><?= $error ?></p>
<?php endif; ?>
    <form action="/Blog/www/articles/<?= $article->getId() ?>/comment/<?= $comment->getId() ?>/edit" method="post">
        <label for="text">Текст комментария</label><br>
        <textarea name="text" id="text" rows="10" cols="80"><?= $_POST['text'] ?? $comment->getText() ?></textarea><br>
        <br>
        <input type="submit" value="Обновить" class="submit">
    </form>
<?php include __DIR__ . '/../footer.php'; ?>