<?php include __DIR__ . '/../header.php'; ?>
<?php foreach ($articles as $article): ?>
  <h2><a href="www/articles/<?= $article->getId() ?>"><?= $article->getName() ?></a></h2> <p><?= $article->getCreatedAt() ?></p>
  <p><?= $article->getText() ?></p>
  <hr>
<?php endforeach; ?>
<?php include __DIR__ . '/../footer.php'; ?>