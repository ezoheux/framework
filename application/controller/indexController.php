<?php

use limeberry\Controller as myController;

class indexController extends myController
{
    public function indexAction($param = 0)
    {
        $this->View->Render('start_screen.php');
    }
}
