<?php

return [
    "~^articles/(.*)$~" => [\MyProject\Controllers\ArticlesController::class, 'view'],
    "~^$~" => [\MyProject\Controllers\MainController::class, 'main']
];
