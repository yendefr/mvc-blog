<?php include __DIR__ . '/../header.php'; ?>
    <div style="text-align: center;">
        <h1>Вход</h1>
        <?php if (! empty($error)): ?>
            <p class="error"><?= $error ?></p>
        <?php endif; ?>
        <form class="main" action="www/login" method="post">
            <label>Email <input type="text" name="email" value="<?= $_POST['email'] ?? '' ?>"></label>
            <br><br>
            <label>Пароль <input type="password" name="password" value="<?= $_POST['password'] ?? '' ?>"></label>
            <br><br>
            <input type="submit" value="Войти">
        </form>
    </div>
<?php include __DIR__ . '/../footer.php'; ?>