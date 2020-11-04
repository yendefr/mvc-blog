<?php

namespace MyProject\Controllers;

use MyProject\Models\Users\User;
use MyProject\Services\UsersAuthService;
use MyProject\View\View;

abstract class AbstractController
{
    /** @var View */
    protected $view;

    /** @var User|null */
    protected $user;

    /** @var string */
    protected $url;

    public function __construct()
    {
        $this->url = (require __DIR__.'/../../settings.php')['url'];
        $this->user = UsersAuthService::getUserByToken();
        $this->view = new View(__DIR__ . '/../../../templates');
        $this->view->setVar('user', $this->user);
    }
}