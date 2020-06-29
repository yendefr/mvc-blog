<?php

return [
    "~^$~" => [\MyProject\Controllers\MainController::class, 'main'], # www/

    "~^articles/(\d+)/?$~" => [\MyProject\Controllers\ArticlesController::class, 'view'], # www/articles/1/
    "~^add/?$~" => [\MyProject\Controllers\ArticlesController::class, 'add'], # www/articles/add/
    "~^articles/(\d+)/edit/?$~" => [\MyProject\Controllers\ArticlesController::class, 'edit'], # www/articles/1/edit/
    "~^articles/(\d+)/delete/?~" => [\MyProject\Controllers\ArticlesController::class, 'remove'], # www/articles/1/delete/

    "~^register/?$~" => [\MyProject\Controllers\UsersController::class, 'signUp'], # www/register/
    "~^login/?$~" => [\MyProject\Controllers\UsersController::class, 'signIn'], # www/login/
    "~^logout/?$~" => [\MyProject\Controllers\UsersController::class, 'signOut'], # www/logout/
    "~^users/(\d+)/activate/(.+)$~" => [\MyProject\Controllers\UsersController::class, 'activate'], # www/users/1/activate/jd834hf

    "~^articles/(\d+)/add-comment/?$~" => [\MyProject\Controllers\CommentsController::class, 'add'], # www/articles/1/add-comment/
];