<?php

    require_once "includes/init.php";

    $view = new View;

    $view->setData([
        'page_title' => format_page_title('Log in')
    ]);

    $view->setPartial('_header');
    $view->setTemplate('login');
    $view->setPartial('_footer');

    $view->render();