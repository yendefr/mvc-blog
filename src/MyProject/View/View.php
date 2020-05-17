<?php


namespace MyProject\View;


class View
{
    private $templatesPath;

    public function __construct($templatesPath)
    {
        $this->templatesPath = $templatesPath;
    }

    public function renderHtml(string $templateName, array $vars = [], int $code = 200)
    {
        http_response_code($code);

        /* Расчехляем массив - его ключи становятся переменными со значениями.
        Т.к. здесь же ниже включается шаблон, в шаблоне будут доступны эти переменные */
        extract($vars);

        // Буферизация данных - для защиты от потери
        ob_start();
        include $this->templatesPath . "/" . $templateName;
        $buffer = ob_get_contents();
        ob_end_clean();

        echo $buffer;
    }
}