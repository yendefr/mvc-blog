<?php include __DIR__ . '/../header.php'; ?>
    <div style="text-align: center;" class="signUp">
        <h1>Регистрация</h1>
        <?php if (! empty($error)): ?>
            <p class="error"><?= $error ?></p>
        <?php endif; ?>
        <?php
          if ($user)
          {
              unset($user); #TODO: Нужно сделать так, чтобы при выходе из аккаунта обнулялся токен или юзер, я хз
          }
        ?>

        <form class="main" action="www/register" method="post">
            <label>Никнейм <input type="text" name="nickname" value="<?= $_POST['nickname'] ?? '' ?>"></label>
            <br><br>
            <label>Почта <input type="text" name="email" value="<?= $_POST['email'] ?? '' ?>"></label>
            <br><br>
            <label>Пароль <input type="password" name="password" value="<?= $_POST['password'] ?? '' ?>"></label>
            <br><br>
            <input type="submit" value="Зарегистрироваться" class="submit">
        </form>
    </div>
<?php include __DIR__ . '/../footer.php'; ?>