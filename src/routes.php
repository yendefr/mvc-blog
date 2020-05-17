<?php

return [
    "~^articles/(.*)$~" => [\MyProject\Controllers\ArticlesController::class, 'view'], # www/articles/1
    "~^$~" => [\MyProject\Controllers\MainController::class, 'main'], # www/
];