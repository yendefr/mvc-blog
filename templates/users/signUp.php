<?php include __DIR__ . '/../header.php'; ?>
    <div class="signUp">
        <h1>Регистрация</h1>
        <?php if (! empty($error)): ?>
            <p class="error"><?= $error ?></p>
        <?php endif; ?>
        <form action="www/register" method="post">
            <label>Никнейм <input type="text" name="nickname" value="<?= $_POST['nickname'] ?? '' ?>"></label>
            <br><br>
            <label>Почта <input type="text" name="email" value="<?= $_POST['email'] ?? '' ?>"></label>
            <br><br>
            <label>Пароль <input type="password" name="password" value="<?= $_POST['password'] ?? '' ?>"></label>
            <br><br>
            <button type="submit">Зарегистрироваться</button>
        </form>
    </div>
<?php include __DIR__ . '/../footer.php'; ?>