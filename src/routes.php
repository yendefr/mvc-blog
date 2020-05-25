<?php

return [
    "~^$~" => [\MyProject\Controllers\MainController::class, 'main'], # www/
    "~^articles/(\d+)/?$~" => [\MyProject\Controllers\ArticlesController::class, 'view'], # www/articles/1/
    "~^articles/(\d+)/edit/?$~" => [\MyProject\Controllers\ArticlesController::class, 'edit'], # www/articles/1/edit/
    "~^add/?$~" => [\MyProject\Controllers\ArticlesController::class, 'add'], # www/articles/add/
    "~^articles/(\d+)/delete/?~" => [\MyProject\Controllers\ArticlesController::class, 'remove'], # www/articles/1/delete/
    "~^register/?$~" => [\MyProject\Controllers\UsersController::class, 'signUp'], # www/register/
    "~^users/(\d+)/activate/(.+)$~" => [\MyProject\Controllers\UsersController::class, 'activate'], # www/users/1/activate/jd834hf
];