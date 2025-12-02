<?php

namespace AEV2\Controllers;

use AEV2\Views\MainView;
class MainController
{

    public function main(): void
    {
        $view = new MainView();
    }

    public function noRuta(): void
    {
        $view = new MainView();
        $view->error();
    }
}
