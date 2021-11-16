<?php

class UserController extends ControllerPrototype
{
    // action<actionName>

    public function actionIndex($param)
    {
        if (is_null($param)) {
            $this->render('index',['id' => 'Неизвестно']);
        } else {
            $this->render('index',['id' => $param]);
        }

    }

    public function actionView()
    {
        $this->render('view');
    }
}
