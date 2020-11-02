<?php if (! empty($error)): ?>
    <p class="error"><?= $error ?></p>
<?php endif; ?>

<div class="comments">
  <form action="<?= $article->getId() ?>/add-comment" method="post">
    <div class="comments__input-form input-form">
      <label for="text" class="label">Добавить комментарий</label> <br>
      <textarea name="text" id="text" cols="60" rows="5" class="comment__textarea"><?= $_POST['text'] ?? '' ?></textarea>
    </div>
    <div class="comments__input-form input-form">
      <input type="submit" value="Создать" class="submit">
    </div>
  </form>
</div>