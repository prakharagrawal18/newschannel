<?php

    require_once "includes/init.php";

    $view = new View;

    $view->setData([
        'page_title' => format_page_title('Register')
    ]);

    $view->setPartial('_header');
    $view->setTemplate('register');
    $view->setPartial('_footer');

    $view->render();