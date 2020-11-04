<?php include __DIR__ . '/../header.php'; ?>
  <section class="view">
    <div class="wrapper">
      <div class="wrap">
        <div class="title"><h1>Регистрация</h1></div>

        <?php if ($user) { unset($user); } ?>
        <?php if (! empty($error)): ?>
            <p class="error"><?= $error ?></p>
        <?php endif; ?>

        <form action="<?= $url ?>register" method="post">
          <div class="input-form">
            <label for="nickname" class="label">Nickname</label> <br>
            <input type="text" name="nickname" id="nickname" value="<?= $_POST['nickname'] ?? '' ?>" class="input-field">
          </div>
          <div class="input-form">
            <label for="email" class="label">Email</label> <br>
            <input type="email" name="email" id="email" value="<?= $_POST['email'] ?? '' ?>" class="input-field">
          </div>
          <div class="input-form">
            <label for="password" class="label">Пароль</label> <br>
            <input type="password" name="password" id="password" value="<?= $_POST['password'] ?? '' ?>" class="input-field">
          </div>
          <div class="register__button">
            <input type="submit" value="Зарегистрироваться" class="submit">
          </div>
        </form>

        <div class="sub">
          <p>Есть аккаунт? - <a href="<?= $url ?>login">Вход</a></p>
        </div>
      </div>
    </div>
  </section>
<?php include __DIR__ . '/../footer.php'; ?>