<?php

class UserController extends ControllerPrototype
{
    // action<actionName>

    public function actionIndex($param = [])
    {
            $this->render('index',['user' => $param,
                                        'email' => 'ildar@thebest.net']);
    }

    public function actionView()
    {
        $this->render('view');
    }
}
