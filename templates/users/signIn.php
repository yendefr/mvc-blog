<?php include __DIR__ . '/../header.php'; ?>
  <section class="view">
    <div class="wrapper">
      <div class="wrap">
        <div class="title"><h1>Вход</h1></div>

          <?php if (! empty($error)): ?>
            <p class="error"><?= $error ?></p>
          <?php endif; ?>

        <form action="login" method="post">
          <div class="input-form">
            <label for="email" class="label">Email</label> <br>
            <input type="email" name="email" id="email" value="<?= $_POST['email'] ?? '' ?>" class="input-field">
          </div>
          <div class="input-form">
            <label for="password" class="label">Пароль</label> <br>
            <input type="password" name="password" id="password" value="<?= $_POST['password'] ?? '' ?>" class="input-field">
          </div>
          <div class="login__button">
            <input type="submit" value="Войти" class="submit">
          </div>
        </form>

        <div class="sub">
          <p>Нет аккаунта? - <a href="register">Регистрация</a></p>
        </div>
      </div>
    </div>
  </section>
<?php include __DIR__ . '/../footer.php'; ?>