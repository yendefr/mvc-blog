<?php

namespace MyProject\Controllers;

use MyProject\Exceptions\UnauthorizedException;
use MyProject\Models\Articles\Article;

use MyProject\View\View;

class MainController extends AbstractController
{
    /**
     * Отображает главную страницу со списоком статей
     */
    public function main()
    {
        # Если пользователь не авторизован, он будет перенаправлен на страницу с предложением войти в аккаунт
        if ($this->user === null) {
            throw new UnauthorizedException();
        }

        $articles = Article::findAll(true);
        $this->view->renderHtml('main/main.php', ['articles' => $articles]);
    }
}