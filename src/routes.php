<?php

return [
    "~^$~" => [\MyProject\Controllers\MainController::class, 'main'], # www/
    "~^articles/(\d+)$~" => [\MyProject\Controllers\ArticlesController::class, 'view'], # www/articles/1
    "~^articles/(\d+)/edit$~" => [\MyProject\Controllers\ArticlesController::class, 'edit'], # www/articles/1/edit
    "~^articles/add$~" => [\MyProject\Controllers\ArticlesController::class, 'add'], # www/articles/1/add
];