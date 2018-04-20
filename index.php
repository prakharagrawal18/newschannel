<?php

    require_once "includes/init.php";

    $view = new View;

    $view->setData([
        'page_title' => format_page_title('Home')
    ]);

    $view->setPartial('_header');
    $view->setTemplate('home');
    $view->setPartial('_footer');

    $view->render();