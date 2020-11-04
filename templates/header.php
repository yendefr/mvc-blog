<?php $url = (require __DIR__.'/../src/settings.php')['url']; ?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Web Blog</title>
  <link rel="shortcut icon" href="<?= $url ?>/img/WB.svg" type="image/svg">
  <link rel="stylesheet" href="<?= $url ?>/css/reset.css">
  <link rel="stylesheet" href="<?= $url ?>/css/styles.css">
</head>
<body>
<header class="header">
  <div class="wrapper">

    <div class="header__wrapper">
      <div class="header__logo">
        <a href="<?= $url ?>" class="header__logo-link">
          Web Blog
        </a>
      </div>

      <div class="header_nav">
        <ul class="header__list">
          <li class="header__item">
            <a href="<?= $url ?>add" class="header__link">Написать статью</a>
          </li>
          <li class="header__item">
            <?php if (isset($user)): ?>
              <a href="<?= $url ?>logout" class="header__link logout"><?= $user->getNickname() ?></a>
            <?php else:?>
              <a href="<?= $url ?>login" class="header__link">Войти</a>
            <?php endif;?>
          </li>
        </ul>
      </div>
    </div>

  </div>
</header>