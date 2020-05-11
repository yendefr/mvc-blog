<?php

return [
    "~^greet/(.*)$~" => [\MyProject\Controllers\MainController::class, 'greet'],
    "~^$~" => [\MyProject\Controllers\MainController::class, 'main']
];
