<?php

class Controller404 extends Controller 
{
    public function actionIndex() 
    {	
        $this->view->generate('404');
    }
}