<?php if (! empty($error)): ?>
    <p class="error"><?= $error ?></p>
<?php endif; ?>
<tr>
  <td colspan="2">
    <form action="www/articles/<?= $article->getId() ?>/add-comment" method="post">
        <label for="text">Добавить комментарий</label><br>
        <textarea name="text" id="text" rows="5" cols="60"><?= $_POST['text'] ?? '' ?></textarea><br>
        <br>
        <input type="submit" value="Создать" class="submit">
    </form>
  </td>
</tr>
