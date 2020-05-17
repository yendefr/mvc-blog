<?php

return [
    "~^articles/(\d+)$~" => [\MyProject\Controllers\ArticlesController::class, 'view'], # www/articles/1
    "~^articles/(\d+)/edit$~" => [\MyProject\Controllers\ArticlesController::class, 'edit'], # www/articles/1/edit
    "~^$~" => [\MyProject\Controllers\MainController::class, 'main'], # www/
];